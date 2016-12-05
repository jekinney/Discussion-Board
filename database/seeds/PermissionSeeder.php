<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
        	['name' => 'Hide Boards', 'description' => 'Can toggle hidden on boards'],
        	['name' => 'Create Boards', 'description' => 'Can create new boards'],
        	['name' => 'Update Boards', 'description' => 'Can update current boards'],
        	['name' => 'Reorder Boards', 'description' => 'Can reorder display boards'],
        	['name' => 'Hide Topics', 'description' => 'Can toggle hidden on topics'],
        	['name' => 'Hide Replies', 'description' => 'Can toggle hidden on replies'],
        	['name' => 'Hide Profiles', 'description' => 'Can toggle hidden on profiles'],
        	['name' => 'Hide Avatar', 'description' => 'Can toggle hidden on avatars'],
        	['name' => 'Ban User', 'description' => 'Can toggle bans on users'],

        	['name' => 'Access Dashboard', 'description' => 'Basic access to the dashboard'],
        	['name' => 'Access Users', 'description' => 'Basic Access to user list in the dashboard'],
        	['name' => 'Access Boards', 'description' => 'Basic access to boards in the dashboard area'],

        	['name' => 'Access Roles', 'description' => 'Basic access to roles in the dashboard area'],
        	['name' => 'Access Create Role', 'description' => 'Can create new roles and assign permissions'],
        	['name' => 'Access Update Role', 'description' => 'Can update existing roles and manage permissions'],
        	['name' => 'Access Assign Role', 'description' => 'Can assign or remove roles on users'],
        	['name' => 'Access Delete Role', 'description' => 'Can delete a role'],
        ];

        foreach($permissions as $permission)
        {
        	$permission = array_add($permission, 'slug', str_slug($permission['name']));
        	\App\Users\Models\Permission::create($permission);
        }
    }
}
