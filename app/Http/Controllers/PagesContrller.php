<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libs\TwitterAPI;

class PagesContrller extends Controller
{
    /**
     * @var TwitterAPI
     */
    protected $twitterAPI;

    /**
     * Instance of controller.
     *
     * @param TwitterAPI $twitterAPI
     * @return void
     */
    public function __construct(TwitterAPI $twitterAPI)
    {
        $this->twitterAPI = $twitterAPI;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function profile()
    {
        if (! session()->has('twitter_account')) {
            $twitterAccount = $this->twitterAPI->getAccount();
            session(['twitter_account' => $twitterAccount]);
        }

        $twitterAccount = session('twitter_account');

        return view('twitter.index', compact('twitterAccount'));
    }
}
