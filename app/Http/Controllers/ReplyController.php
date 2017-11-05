<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \app\Channel     $channelId
     * @return \app\Thread      $thread
     */
    public function store($channelId, Thread $thread)
    {
        $this->validate(request(), [
            'body' => 'required',
        ]);

    	$thread->addReply([
    		'body'		=> request('body'),
    		'user_id'	=> auth()->id(),
    	]);

    	return back();
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('update', $reply);

        $reply->delete();

        return back();
    }
}
