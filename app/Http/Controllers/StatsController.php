<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libs\TwitterAPI;


class StatsController extends Controller
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

	public function profile () {
		if (! session()->has('twitter_account')) {
            $twitterAccount = $this->twitterAPI->getAccount();
            session(['twitter_account' => $twitterAccount]);
        }

        $twitterAccount = session('twitter_account');

        // return view('twitter.index', compact('twitterAccount'));
		return view('stats.stats', compact('twitterAccount'));
	}

}

?>