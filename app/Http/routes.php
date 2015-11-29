<?php

Route::get('/', function() {
    if (! session()->has('twitter_account')) return redirect('logout');

    return redirect("dashboard");
});

Route::get('/twitter-login-callback', [
    'as' => 'twitter_signin_callback',
    'uses' => 'LoginController@signInCallback'
]);

Route::get('/login', [
    'as' => 'login_path',
    'uses' => 'LoginController@index'
]);

Route::get('/dashboard', ['as' => 'dashboard_path', 'uses' => 'PagesController@dashboard']);

Route::post('/twitter-status', [
    'as' => 'twitter_status_update',
    'uses' => 'TwitterController@updateStatus'
]);

Route::get('/logout', [
    'as' => 'logout_path',
    'uses' => 'LoginController@logout'
 ]);

Route::get('/profile', [
    'as' => 'profile_path',
    'uses' => 'ProfileController@profile'
]);

Route::get('/stats', [
    'as' => 'stats_path',
    'uses' => 'StatsController@profile',
]);
Route::get('/settings', 'SettingsController@profile');

Route::get('/help', [
    'as' => 'help_path',
    'uses' => 'HelpController@profile'
]);
