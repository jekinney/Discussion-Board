<?php

namespace App\Users\Models;

use App\Users\Traits\CheckAccess;
use App\Users\Traits\UserQueries;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, CheckAccess, UserQueries;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = bcrypt($password);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function avatars()
    {
        return $this->hasMany(Avatar::class);
    }

    public function activeAvatar()
    {
        if($this->use_gravatar) {
            return $this->gravatar;
        }
        $path = $this->hasMany(Avatar::class)->where('active', 1)->first(['image_path']);
        return $path->image_path;
    }
}
