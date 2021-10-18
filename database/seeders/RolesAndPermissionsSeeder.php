<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'user_list']);
        Permission::create(['name' => 'user_create']);
        Permission::create(['name' => 'user_status']);
        Permission::create(['name' => 'user_info']);
        Permission::create(['name' => 'user_password']);
        Permission::create(['name' => 'user_2fa']);

        Permission::create(['name' => 'test_see']);
        Permission::create(['name' => 'test_create']);
        Permission::create(['name' => 'test_update']);
        Permission::create(['name' => 'test_delete']);

        // create roles and assign created permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
        // or may be done by chaining

        $role = Role::create(['name' => 'support'])
            ->givePermissionTo(['user_info', 'user_2fa']);

        $role = Role::create(['name' => 'support-super'])
            ->givePermissionTo(['user_info', 'user_2fa','user_password','user_status']);

    }
}