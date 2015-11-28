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
        // $connection = new TwitterOAuth( env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET') );
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
     * Verify access token
     *
     * @param string $oauthVerifier
     * @return mix
     */
    public function verifyAccessToken($oauthVerifier)
    {
        // $connection = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), session('oauth_token'), session('oauth_token_secret'));
        $connection = $this->getConnection();
        $accessToken = $connection->oauth("oauth/access_token", array("oauth_verifier" => $oauthVerifier));

        session()->forget('twitter_account');
        session(['access_token' => $accessToken]);

        return $accessToken;
    }

}
