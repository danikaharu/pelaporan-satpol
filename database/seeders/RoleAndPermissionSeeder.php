<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'list role']);
        Permission::create(['name' => 'show role']);
        Permission::create(['name' => 'add role']);
        Permission::create(['name' => 'edit role']);
        Permission::create(['name' => 'delete role']);
        Permission::create(['name' => 'list user']);
        Permission::create(['name' => 'show user']);
        Permission::create(['name' => 'add user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'list entries']);
        Permission::create(['name' => 'show entries']);
        Permission::create(['name' => 'add entries']);
        Permission::create(['name' => 'delete entries']);

        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo(Permission::all());
    }
}
