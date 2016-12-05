<?php

namespace App\Site\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
	    'user_id',
    	'up_vote',
		'down_vote',
	];

	public function voteable()
	{
		return $this->morphTo();
	}

	public function handle($request)
	{
		if(auth()->check()) {
			if($found = $this->classes($request->type, $request->uid)) {
				if($userVoted = $found->votes->where('user_id', auth()->id())->first()) {
					$userVoted->update([
						'up_vote' => $request->has('up'), 
						'down_vote' => $request->has('down'),
					]);
				} else {
					$found->votes()->create([
						'user_id' => auth()->id(), 
						'up_vote' => $request->has('up'), 
						'down_vote' => $request->has('down'),
					]);
				}
			}
		}
	}

	public function counts($request)
	{
		if($found = $this->classes($request->type, $request->uid)) {
			$userVoted = false;
			if(auth()->check()) {
				$voted = $found->votes->where('user_id', auth()->id())->first();
				if($voted) {
					$userVoted = $voted->up? 'up':'down';
				} 
			}
			return [
				'up_votes' => $found->votes->where('up_vote', 1)->count(),
				'down_votes' => $found->votes->where('down_vote', 1)->count(),
				'user_voted' => $userVoted,
			];
		}
	}

	protected function classes($type, $uid)
	{
		$avalible = [
			'topic' => '\App\Boards\Models\Topic',
			'reply' => '\App\Boards\Models\Reply',
		];

		$namespace = $avalible[$type];
		if($namespace) {
			$object = new $namespace();
			$find = $object->where('uid', $uid)->first();
			if($find) {
				return $find->load('votes');
			}
		}
		return null;
	}
}
