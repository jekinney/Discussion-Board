<?php

namespace App\Users\Models;

use App\Users\Traits\RoleQueries;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use RoleQueries;

    protected $fillable = [
    	'slug',
    	'name',
    	'description',
    ];

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
    	return $this->belongsToMany(Permission::class);
    }
}
