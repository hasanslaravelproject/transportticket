<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list services']);
        Permission::create(['name' => 'view services']);
        Permission::create(['name' => 'create services']);
        Permission::create(['name' => 'update services']);
        Permission::create(['name' => 'delete services']);

        Permission::create(['name' => 'list busroutes']);
        Permission::create(['name' => 'view busroutes']);
        Permission::create(['name' => 'create busroutes']);
        Permission::create(['name' => 'update busroutes']);
        Permission::create(['name' => 'delete busroutes']);

        Permission::create(['name' => 'list seatclasses']);
        Permission::create(['name' => 'view seatclasses']);
        Permission::create(['name' => 'create seatclasses']);
        Permission::create(['name' => 'update seatclasses']);
        Permission::create(['name' => 'delete seatclasses']);

        Permission::create(['name' => 'list buses']);
        Permission::create(['name' => 'view buses']);
        Permission::create(['name' => 'create buses']);
        Permission::create(['name' => 'update buses']);
        Permission::create(['name' => 'delete buses']);

        Permission::create(['name' => 'list buscategories']);
        Permission::create(['name' => 'view buscategories']);
        Permission::create(['name' => 'create buscategories']);
        Permission::create(['name' => 'update buscategories']);
        Permission::create(['name' => 'delete buscategories']);

        Permission::create(['name' => 'list busschedules']);
        Permission::create(['name' => 'view busschedules']);
        Permission::create(['name' => 'create busschedules']);
        Permission::create(['name' => 'update busschedules']);
        Permission::create(['name' => 'delete busschedules']);

        Permission::create(['name' => 'list companies']);
        Permission::create(['name' => 'view companies']);
        Permission::create(['name' => 'create companies']);
        Permission::create(['name' => 'update companies']);
        Permission::create(['name' => 'delete companies']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
