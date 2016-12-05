<?php

namespace App\Users\Traits;

trait CheckAccess 
{
	public function roles()
	{
		return $this->belongsToMany(Role::class);
	}

	public function hasRole($role)
	{
		if(is_array($role)) {
			foreach($role as $roleSlug) {
				$check = $this->hasRole($roleSlug);
				if(!$check) {
					return false;
				}
			}
		} else {
			foreach($this->roles as $userRole) {
				if($userRole->slug == $role) {
					return true;
				}
			}
		}
		return false;
	}

	public function hasPermission($permission)
	{
		foreach($this->roles as $role) {
			foreach($role->permissions as $userPermission) {
				if($userPermisison->slug == $permisison) {
					return true;
				}
			}
		}
		return false;
	}
}