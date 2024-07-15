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


       $permission = Permission::create(['name' => 'bibliotecario']);
       
        $permissionbibliotecario = Permission::create(['name' => 'users']);

        //esto protege las rutas de bibliotecario 
        $pricipalBibliotecario = Permission::create(['name' => 'index.bibliotecario']);
        $createBibliotecario = Permission::create(['name' => 'create.bibliotecario']);
        $readBibliotecario = Permission::create(['name' => 'show.bibliotecario']);
        $updateBibliotecario = Permission::create(['name' => 'edit.bibliotecario']);
        $deleteBibliotecario = Permission::create(['name' => 'delete.bibliotecario']);

        $rol1->givePermissionTo([$createBibliotecario,$pricipalBibliotecario, $readBibliotecario, $updateBibliotecario, $deleteBibliotecario]);
        
       $rol2->givePermissionTo($permissionbibliotecario);
     
       
    }
}
