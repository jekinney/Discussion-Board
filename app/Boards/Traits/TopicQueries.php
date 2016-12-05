<?php

namespace App\Boards\Traits;

trait TopicQueries
{
	public function publicShowView($slug)
	{
		return $this->with('board', 'replies', 'replies.user')
			->where('slug', $slug)
			->first();
	}
}