<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libs\TwitterAPI;

class TwitterController extends Controller
{
    /**
     * @var TwitterAPI
     */
    protected $twitterAPI;

    /**
     * Instance of twitter controller.
     *
     * @param TwitterAPI $twitterAPI
     */
    public function __construct(TwitterAPI $twitterAPI)
    {
        $this->twitterAPI = $twitterAPI;
    }

    /**
     * Handle update status.
     *
     * @param Request $request
     * @return redirect
     */
    public function updateStatus(Request $request)
    {
        $updateStatus = $this->twitterAPI->updateStatus($request->input('status'));

        if (! $updateStatus['error'])
        {
            return redirect('twitter-profile')
                ->with("message", "Update status success!")
                ->with("success", true);
        }

        return redirect('twitter-profile')
            ->with('message', 'Error: can"t update status')
            ->with('success', false);
    }
}
