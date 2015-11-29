<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libs\TwitterAPI;
use App\Status;
use App\User;

class PagesController extends Controller
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
     * @param Status $status
     * @return Response
     */
    public function dashboard(Status $status)
    {
        if (! session()->has('twitter_account')) {
            $twitterAccount = $this->twitterAPI->getAccount();
            session(['twitter_account' => $twitterAccount]);

            $user = User::whereUsername($twitterAccount->screen_name)->first();
            $user->profile_image_url = $twitterAccount->profile_image_url;
            $user->save();
        }

        $twitterAccount = session('twitter_account');
        $statuses = $status->take(7)->get();

        return view('twitter.index', compact('twitterAccount', 'statuses'));
    }
}
