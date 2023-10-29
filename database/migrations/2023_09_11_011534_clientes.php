<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('IdCliente');
            $table->char('Dni', 8);
            $table->string('NombresCliente');
            $table->string('ApellidosCliente');
            $table->string('NroTelefono');
            $table->timestamps();
        });
        DB::table('clientes')->insert(['Dni'=>'75359962', 'NombresCliente'=>'Sthephanie Carolina', 'ApellidosCliente'=>'Cabrera Honorio', 'NroTelefono'=>'974139283']);
        DB::table('clientes')->insert(['Dni'=>'77493445', 'NombresCliente'=>'Keyco Clesehisy', 'ApellidosCliente'=>'Chavez Quintana', 'NroTelefono'=>'970679846']);
        DB::table('clientes')->insert(['Dni'=>'70492974', 'NombresCliente'=>'Angel Martin', 'ApellidosCliente'=>'Amaya Cruz', 'NroTelefono'=>'920842645']);
        DB::table('clientes')->insert(['Dni'=>'76341435', 'NombresCliente'=>'Willian Samuel', 'ApellidosCliente'=>'Miranda Huaman', 'NroTelefono'=>'918661835']);
        DB::table('clientes')->insert(['Dni'=>'75465390', 'NombresCliente'=>'Jorge Andres', 'ApellidosCliente'=>'Cotrina Oliva', 'NroTelefono'=>'952569688']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('clientes');
    }
};
