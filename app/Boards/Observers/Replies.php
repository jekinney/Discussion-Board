<?php

namespace App\Boards\Observers;

use App\Boards\Models\Reply;

class Replies
{
	/**
     * Listen to the User creating event.
     *
     * @param  User  $user
     * @return void
     */
    public function creating(Reply $reply)
    {
        $reply->uid = uniqid(true);
    }

}