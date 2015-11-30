<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libs\TwitterAPI;
use App\Status;

class ProfileController extends Controller
{
    /**
     * @var Status
     */
    protected $status;

    /**
     * @var TwitterAPI
     */
    protected $twitterAPI;

    /**
     * Instance of controller.
     *
     * @param TwitterAPI $twitterAPI
     * @param Status $status
     * @return void
     */
    public function __construct(TwitterAPI $twitterAPI, Status $status)
    {
        $this->twitterAPI = $twitterAPI;
        $this->status = $status;
    }

	public function profile () {
		if (! session()->has('twitter_account')) {
            $twitterAccount = $this->twitterAPI->getAccount();
            session(['twitter_account' => $twitterAccount]);
        }

        $twitterAccount = session('twitter_account');
        $statuses = $this->status->whereUserId(session('user_id'))->get();

		return view('profile.profile', compact('twitterAccount', 'statuses'));
	}

}

?>
