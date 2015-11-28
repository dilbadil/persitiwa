<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libs\TwitterAPI;
use App\Status;

class TwitterController extends Controller
{
    /**
     * @var TwitterAPI
     */
    protected $twitterAPI;

    /**
     * @var Status
     */
    protected $status;

    /**
     * Instance of twitter controller.
     *
     * @param TwitterAPI $twitterAPI
     * @param Status $status
     */
    public function __construct(TwitterAPI $twitterAPI, Status $status)
    {
        $this->twitterAPI = $twitterAPI;
        $this->status = $status;
    }

    /**
     * Handle update status.
     *
     * @param Request $request
     * @return redirect
     */
    public function updateStatus(Request $request)
    {
        $locationId = $request->has('location_id') ? $request->input('location_id') : null;
        $updateStatus = $this->twitterAPI->updateStatus($request->input('status'));

        if (! $updateStatus['error'])
        {
            // Save to table status
            $data = $updateStatus['data'];
            $this->status->create([
                'status_id' => $data->id,
                'body' => $data->text,
                'user_id' => session('user_id'),
                'lokasi_peristiwa' => $locationId,
                'lokasi_status' => $data->coordinates,
            ]);
            
            // Redirect
            return redirect('twitter-profile')
                ->with("message", "Update status success!")
                ->with("success", true);
        }

        return redirect('twitter-profile')
            ->with('message', 'Error: can"t update status')
            ->with('success', false);
    }
}
