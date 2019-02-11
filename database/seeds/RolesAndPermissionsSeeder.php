<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit patients']);
        Permission::create(['name' => 'delete patients']);

        $role = Role::create(['name' => 'Doctor'])
            ->givePermissionTo([
                'edit patients',
                'delete patients'
            ]);

        $role = Role::create(['name' => 'Staff'])
            ->givePermissionTo([
                'edit patients',
                'delete patients'
            ]);

        $role = Role::create(['name' => 'Manager'])
            ->givePermissionTo([
                'edit patients',
                'delete patients'
            ]);

        $role = Role::create(['name' => 'Administrator']);
        $role->givePermissionTo(Permission::all());

    }
}
