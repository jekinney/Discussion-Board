<?php

namespace App\Boards\Models;

use App\Boards\Traits\BoardQueries;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use BoardQueries;
    
    protected $fillable = [
    	'uid',
    	'slug',
    	'title',
    	'description',
    	'hidden',
    	'hidden_by',
	];

	public function topics()
	{
		return $this->hasMany(Topic::class);
	}

    public function votes()
    {
        return $this->morphMany(\App\Site\Models\Vote::class, 'voteable');
    }
}
