<?php

namespace App\Users\Traits;

trait UserQueries
{
	public function register($request)
	{
		$user = $this->create($request->all());
		$user->profile()->create($request->all());
		return $user;
	}
}