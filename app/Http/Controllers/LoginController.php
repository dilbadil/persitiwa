<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libs\TwitterAPI;
use App\User;

class LoginController extends Controller
{
    /**
     * @var TwitterAPI
     */
    protected $twitterAPI;

    /**
     * @var User
     */
    protected $user;

    /**
     * Instance of controller.
     *
     * @param TwitterAPI $twitter
     * @param User $user
     * @return void
     */
    public function __construct(TwitterAPI $twitter, User $user)
    {
        $this->twitterAPI = $twitter;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Always delete oauth_token
        session()->forget('oauth_token');
        session()->forget('oauth_token_secret');

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

        $twitterUsername = $accessToken['screen_name'];

        // Insert into database if no exist.
        if (! $this->user->whereUsername($twitterUsername)->first())
        {
            $user = $this->user->create([
                'username' => $twitterUsername,
                'account' => 'twitter'
            ]);
            session(['user_id' => $user->id]);
        }

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
        session()->forget('user_id');

        return redirect(route('login_path'));
    }
}
