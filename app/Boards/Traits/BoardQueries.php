<?php

namespace App\Boards\Traits;

trait BoardQueries
{
	public function publicIndexView()
	{
		return $this->withCount('topics')
			->where('hidden', 0)
			->orderBy('order', 'asc')
			->get();
	}

	public function publicShowView($slug)
	{
		return $this->with(['topics' => function($q) {
				$q->withCount('replies');
			}])
			->where('slug', $slug)
			->first();
	}
}