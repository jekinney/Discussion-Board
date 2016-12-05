<?php

namespace App\Boards\Observers;

use App\Boards\Models\Board;

class Boards
{
	/**
     * Listen to the User creating event.
     *
     * @param  User  $user
     * @return void
     */
    public function creating(Board $board)
    {
        $board->slug = str_slug($board->title);
        $board->uid = uniqid(true);
        if(!isset($board->order)) {
        	$board->order = $board->count() + 1;
        }
    }

}
