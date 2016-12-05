<?php

namespace App\Boards\Observers;

use App\Boards\Models\Topic;

class Topics
{
	/**
     * Listen to the User creating event.
     *
     * @param  User  $user
     * @return void
     */
    public function creating(Topic $topic)
    {
        $topic->slug = str_slug($topic->title);
        $topic->uid = uniqid(true);
    }

}