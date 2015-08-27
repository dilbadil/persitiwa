<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('twitter-login-callback', ['as' => 'twitter_signin_callback', function(Illuminate\Http\Request $request) {
    
    if (! $request->has('oauth_verifier')) return "Access denied !";

    $oauthVerifier = $request->input('oauth_verifier');
    $connection = new Abraham\TwitterOAuth\TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), session('oauth_token'), session('oauth_token_secret'));
    $accessToken = $connection->oauth("oauth/access_token", array("oauth_verifier" => $oauthVerifier));

    session(['access_token' => $accessToken]);

    return redirect('twitter-profile');
}]);

Route::get('/login', ['as' => 'login_path', function(Illuminate\Http\Request $request) {

    $connection = new Abraham\TwitterOAuth\TwitterOAuth( env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET') );
    $requestToken = $connection->oauth('oauth/request_token', array('oauth_callback' => route('twitter_signin_callback')));

    session([
        'oauth_token' => $requestToken['oauth_token'],
        'oauth_token_secret' => $requestToken['oauth_token_secret']
    ]);

    $urlTwitter = $connection->url('oauth/authenticate', ['oauth_token' => session('oauth_token')]);

    return view('layouts.login', compact('urlTwitter'));
}]);

Route::get('/twitter-profile', function() {
    $accessToken = session('access_token');

    if (! session()->has('twitter_account')) {
        $connection = new Abraham\TwitterOAuth\TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), $accessToken['oauth_token'], $accessToken['oauth_token_secret']);
        $twitterAccount = $connection->get("account/verify_credentials");
        session([
            'twitter_account' => $twitterAccount
        ]);
    }

    $twitterAccount = session('twitter_account');

    return view('twitter.index', compact('twitterAccount'));
});

Route::post('/twitter-status', ['as' => 'twitter_status_update', function(Illuminate\Http\Request $request) {
    $connection = new Abraham\TwitterOAuth\TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), session('access_token.oauth_token'), session('access_token.oauth_token_secret'));
    $statues = $connection->post("statuses/update", ["status" => $request->input('status')]);

    if ($connection->getLastHttpCode() == 200) {
        return redirect('twitter-profile')
            ->with("message", "Update status success!")
            ->with("success", true);
    }

    return redirect('twitter-profile')
        ->with('message', 'Error: can"t update status')
        ->with('success', false);
}]);

Route::post('/twitter-send-message', ['as' => 'twitter_send_message', function(Illuminate\Http\Request $request){
    $connection = new Abraham\TwitterOAuth\TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), session('access_token.oauth_token'), session('access_token.oauth_token_secret'));
    $fields =  [
        'message' => $request->input('message'),
        'to' => $request->input('to'),
    ];
    $request = $connection->post("direct_messages/new", $fields);

    if ($connection->getLastHttpCode() == 200) {
        return redirect('twitter-profile')
            ->with('message', "Message sent to @" . $request->input('to'))
            ->with('success', true);
    }

    return redirect('twitter-profile')
        ->with('message', "Send message failed!")
        ->with('success', false);
}]);
