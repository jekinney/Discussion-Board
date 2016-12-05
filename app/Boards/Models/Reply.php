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
}
