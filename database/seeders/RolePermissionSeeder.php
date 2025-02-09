<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Permission::create(['name' => 'add_user']);
        Permission::create(['name' => 'edit_user']);
        Permission::create(['name' => 'delete_user']);
        Permission::create(['name' => 'show_user']);

        Permission::create(['name' => 'add_text']);
        Permission::create(['name' => 'edit_text']);
        Permission::create(['name' => 'delete_text']);
        Permission::create(['name' => 'show_text']);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'writer']);

        $roleAdmin = Role::findbyname('admin');
        $roleAdmin->givePermissionTo('add_user');
        $roleAdmin->givePermissionTo('edit_user');
        $roleAdmin->givePermissionTo('delete_user');
        $roleAdmin->givePermissionTo('show_user');

        $roleWriter = Role::findbyname('writer');
        $roleWriter->givePermissionTo('add_text');
        $roleWriter->givePermissionTo('edit_text');
        $roleWriter->givePermissionTo('delete_text');
        $roleWriter->givePermissionTo('show_text');
    }
}
