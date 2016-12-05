<?php

namespace App\Boards\Models;

use App\Boards\Traits\TopicQueries;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use TopicQueries;
    
    protected $fillable = [
    	'user_id',
    	'board_id',
    	'title',
    	'slug',
    	'body',
    	'hidden',
    	'hidden_by',
    ];

    public function board()
    {
    	return $this->belongsTo(Board::class);
    }

    public function replies()
    {
    	return $this->hasMany(Reply::class);
    }

    public function user()
    {
    	return $this->belongsTo(\App\Users\Models\User::class);
    }
}
