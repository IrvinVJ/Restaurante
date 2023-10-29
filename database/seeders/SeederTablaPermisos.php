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

            //Operaciones sobre tabla users
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

            //Operaciones sobre tabla productos
            'ver-producto',
            'crear-producto',
            'editar-producto',
            'borrar-producto',

            //Operaciones sobre tabla presupuestos
            'ver-presupuesto',
            'crear-presupuesto',
            'editar-presupuesto',
            'borrar-presupuesto',

            //Operaciones sobre tabla ingresos
            'ver-ingreso',
            'crear-ingreso',
            'editar-ingreso',
            'borrar-ingreso',

            //Operaciones sobre tabla platos
            'ver-plato',
            'crear-plato',
            'editar-plato',
            'borrar-plato',

            //Operaciones sobre tabla mesas
            'ver-mesa',
            'crear-mesa',
            'editar-mesa',
            'borrar-mesa',

            //Operaciones sobre tabla pedidos
            'ver-pedido',
            'crear-pedido',
            'editar-pedido',
            'borrar-pedido',

            //Operaciones sobre tabla clientes
            'ver-cliente',
            'crear-cliente',
            'editar-cliente',
            'borrar-cliente',

            //Operaciones sobre tabla reservaciones
            'ver-reservacion',
            'crear-reservacion',
            'editar-reservacion',
            'borrar-reservacion',

            //Operaciones sobre tabla ventas
            'ver-venta',
            'crear-venta',
            'editar-venta',
            'borrar-venta',

            //Operaciones sobre módulo reportes
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
