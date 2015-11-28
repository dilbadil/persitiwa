<?php

namespace App\Libs;

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterAPI {

    public function getConnection()
    {
        if (session()->has('oauth_token') && session()->has('oauth_token_secret')) {
            $connection = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), session('oauth_token'), session('oauth_token_secret'));
        } else {
            $connection = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'));
        }

        return $connection;
    }

    /**
     * Request token by callback url.
     *
     * @param string $callbackUrl
     * @return string
     */
    public function requestToken($callbackUrl)
    {
        $connection = $this->getConnection();
        $requestToken = $connection->oauth('oauth/request_token', ['oauth_callback' => $callbackUrl]);

        session([
            'oauth_token' => $requestToken['oauth_token'],
            'oauth_token_secret' => $requestToken['oauth_token_secret']
        ]);

        $url = $connection->url('oauth/authenticate', ['oauth_token' => session('oauth_token')]);

        return $url;
    }

    /**
     * Get access token
     *
     * @param string $oauthVerifier
     * @return mix
     */
    public function getAccessToken($oauthVerifier)
    {
        $connection = $this->getConnection();
        $accessToken = $connection->oauth("oauth/access_token", array("oauth_verifier" => $oauthVerifier));

        // Update oauth_token and oauth_token_secret
        session([
            'oauth_token' => $accessToken['oauth_token'],
            'oauth_token_secret' => $accessToken['oauth_token_secret']
        ]);

        return $accessToken;
    }

    /**
     * Get current twitter account.
     *
     * @return TwitterOAuth
     */
    public function getAccount()
    {
        $connection = $this->getConnection();
        $twitterAccount = $connection->get("account/verify_credentials");

        return $twitterAccount;
    }

    /**
     * Update status.
     *
     * @param string $statusText
     * @return array
     */
    public function updateStatus($statusText)
    {
        $connection = $this->getConnection();
        $connection->post("statuses/update", ["status" => $statusText]);
        $data = $connection->getLastBody();
        $result = [
            'status' => 'failed',
            'error' => true,
            'data' => $data
        ];

        if ($connection->getLastHttpCode() == 200) {
            $result['status'] = 'ok';
            $result['error'] = false;
        }

        return $result;
    }

}
