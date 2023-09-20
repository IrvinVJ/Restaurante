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
            'borrar-usuario',

            //Operacions sobre tabla productos
            'ver-producto',
            'crear-producto',
            'editar-producto',
            'borrar-producto',

            //Operacions sobre tabla ingresos
            'ver-ingreso',
            'crear-ingreso',
            'editar-ingreso',
            'borrar-ingreso',

            //Operacions sobre tabla platos
            'ver-plato',
            'crear-plato',
            'editar-plato',
            'borrar-plato',

            //Operacions sobre tabla pedidos
            'ver-pedido',
            'crear-pedido',
            'editar-pedido',
            'borrar-pedido',

            //Operacions sobre tabla ventas
            'ver-venta',
            'crear-venta',
            'editar-venta',
            'borrar-venta',

            //Operacions sobre módulo reportes
            'ver-reporte',
            'crear-reporte',
            'editar-reporte',
            'borrar-reporte',
        ];
        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
