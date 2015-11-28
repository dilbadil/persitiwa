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
Route::get('/', function() {
    return "hello world";
});

Route::get('/twitter-login-callback', ['as' => 'twitter_signin_callback', 'uses' => 'LoginController@signInCallback']);

Route::get('/login', ['as' => 'login_path', 'uses' => 'LoginController@index']);

Route::get('/twitter-profile', function(Illuminate\Http\Request $request) {
    $accessToken = session('access_token');

    if (! session()->has('twitter_account')) {
        $connection = new Abraham\TwitterOAuth\TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), $accessToken['oauth_token'], $accessToken['oauth_token_secret']);
        $twitterAccount = $connection->get("account/verify_credentials");
        session(['twitter_account' => $twitterAccount]);
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

Route::get('/logout', ['as' => 'logout_path', 'uses' => 'LoginController@logout']);
