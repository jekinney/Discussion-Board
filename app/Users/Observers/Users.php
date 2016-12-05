<?php

namespace App\Users\Observers;

use App\Users\Models\User;

class Users
{
	/**
     * Listen to the User creating event.
     *
     * @param  User  $user
     * @return void
     */
    public function creating(User $user)
    {
        $user->slug = str_slug($user->name);
        $user->uid = uniqid(true);
        $user->gravatar = 'https://www.gravatar.com/avatar/'.md5($user->email);
    }
}