<?php

namespace App\Boards\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
    	'user_id',
    	'topic_id',
    	'uid',
    	'body',
    	'hidden',
    	'hidden_by',
    ];

    public function user()
    {
    	return $this->belongsTo(\App\Users\Models\User::class);
    }

    public function topic()
    {
    	return $this->belongsTo(Topic::class);
    }
    
    public function votes()
    {
        return $this->morphMany(\App\Site\Models\Vote::class, 'voteable');
    }
}
