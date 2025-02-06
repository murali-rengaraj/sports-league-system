<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'create']);
        Permission::create(['name'=>'edit']);
        Permission::create(['name'=>'delete']);
        Permission::create(['name'=>'view']);

        $adminRole= Role::create(["name"=>'admin']);
        $adminRole->givePermissionTo(['create','edit','delete']);

        $userRole= Role::create(["name"=>"user"]);
        $userRole->givePermissionTo(["view"]);
    }
}
