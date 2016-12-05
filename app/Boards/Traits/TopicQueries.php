<?php

namespace App\Boards\Traits;

trait TopicQueries
{
	public function publicShowView($slug)
	{
		return $this->with('board', 'replies')
			->where('slug', $slug)
			->first();
	}
}