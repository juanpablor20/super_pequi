<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $rol1 =  Role::create(['name' => 'cordinador']);
       $rol2 =  Role::create(['name' => 'bibliotecario']);
       $rol3 =  Role::create(['name' => 'aprendices']);
       $rol4 =  Role::create(['name' => 'instructor']);


       $permission = Permission::create(['name' => 'bibliotecarios']);

       $rol1->givePermissionTo($permission);
       
       $rol2->givePermissionTo($permission);
    }
}
