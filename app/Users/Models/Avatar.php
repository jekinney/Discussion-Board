<?php

namespace App\Users\Models;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $fillable = [
    	'user_id',
		'image_path',
		'active',
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
