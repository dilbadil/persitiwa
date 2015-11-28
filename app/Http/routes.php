<?php

Route::get('/', function() {
    return "hello world";
});

Route::get('/twitter-login-callback', [
    'as' => 'twitter_signin_callback',
    'uses' => 'LoginController@signInCallback'
]);

Route::get('/login', [
    'as' => 'login_path',
    'uses' => 'LoginController@index'
]);

Route::get('/twitter-profile', 'PagesContrller@profile');

Route::post('/twitter-status', [
    'as' => 'twitter_status_update',
    'uses' => 'TwitterController@updateStatus'
]);

Route::get('/logout', [
    'as' => 'logout_path',
    'uses' => 'LoginController@logout'
 ]);
