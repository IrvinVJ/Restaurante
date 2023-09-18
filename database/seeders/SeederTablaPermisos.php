<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [
            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operacions sobre tabla users
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario'
        ];
        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
