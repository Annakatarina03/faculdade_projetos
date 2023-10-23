<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Permission::create(['name' => 'create-employee']);
        Permission::create(['name' => 'edit-employee']);
        Permission::create(['name' => 'delete-employee']);

        Permission::create(['name' => 'create-revenue']);
        Permission::create(['name' => 'edit-revenue']);
        Permission::create(['name' => 'delete-revenue']);

        Permission::create(['name' => 'create-cookbook']);
        Permission::create(['name' => 'edit-cookbook']);
        Permission::create(['name' => 'delete-cookbook']);

        Permission::create(['name' => 'create-tasting']);
        Permission::create(['name' => 'edit-tasting']);
        Permission::create(['name' => 'delete-tasting']);


        $adminRole = Role::create(['name' => 'Administrador']);
        $editorRole = Role::create(['name' => 'Editor']);
        $chefRole = Role::create(['name' => 'Chef de Cozinha']);
        $tasterRole = Role::create(['name' => 'Degustador']);

        $adminRole->givePermissionTo([
            'create-employee',
            'edit-employee',
            'delete-employee',
        ]);

        $editorRole->givePermissionTo([
            'create-cookbook',
            'edit-cookbook',
            'delete-cookbook',
        ]);

        $chefRole->givePermissionTo([
            'create-revenue',
            'edit-revenue',
            'delete-revenue',
        ]);

        $tasterRole->givePermissionTo([
            'create-tasting',
            'edit-tasting',
            'delete-tasting',
        ]);
    }
}
