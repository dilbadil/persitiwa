<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libs\TwitterAPI;

class LoginController extends Controller
{
    /**
     * Instance of controller.
     *
     * @param TwitterAPI $twitter
     * @return void
     */
    public function __construct(TwitterAPI $twitter)
    {
        $this->twitterAPI = $twitter;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $urlTwitter = $this->twitterAPI->requestToken( route('twitter_signin_callback') );

        return view('layouts.login', compact('urlTwitter'));
    }

    /**
     * Handle signin callback.
     *
     * @param Request $request
     * @return redirect
     */
    public function signInCallback(Request $request)
    {
        if (! $request->has('oauth_verifier')) return "Access denied !";

        $oauthVerifier = $request->input('oauth_verifier');
        $accessToken = $this->twitterAPI->getAccessToken($oauthVerifier);

        session()->forget('twitter_account');
        session(['access_token' => $accessToken]);

        return redirect('twitter-profile');
    }

    /**
     * Logout and redirect to login.
     *
     * @return redirect
     */
    public function logout()
    {
        session()->forget('twitter_account');
        session()->forget('access_token');
        session()->forget('oauth_token');
        session()->forget('oauth_token_secret');

        return redirect(route('login_path'));
    }
}
