<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');
        //create permission
        Permission::create(['name'=>'create user']);
        Permission::create(['name'=>'read users']);
        Permission::create(['name'=>'update user']);
        Permission::create(['name'=>'delete user']);

        Permission::create(['name'=>'create role']);
        Permission::create(['name'=>'read roles']);
        Permission::create(['name'=>'update role']);
        Permission::create(['name'=>'delete role']);

        Permission::create(['name'=>'create permission']);
        Permission::create(['name'=>'read permissions']);
        Permission::create(['name'=>'update permission']);
        Permission::create(['name'=>'delete permission']);

        //create roles and assign created permissions

        $role = Role::create(['name'=>'usuario']);
        $role->givePermissionTo('read users');

        $role = Role::create(['name'=>'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
