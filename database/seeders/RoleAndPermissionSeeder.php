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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Permissies voor Project CRUD
        Permission::create(['name' => 'index project']);
        Permission::create(['name' => 'show project']);
        Permission::create(['name' => 'create project']);
        Permission::create(['name' => 'edit project']);
        Permission::create(['name' => 'delete project']);

        $Student = Role::create(['name' => 'student'])
            ->givePermissionTo(['index project', 'show project', 'create project', 'edit project']);

        $Teacher = Role::create(['name' => 'teacher'])
            ->givePermissionTo(['index project', 'show project', 'create project', 'edit project']);

        $Admin = Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all());

    }
}
