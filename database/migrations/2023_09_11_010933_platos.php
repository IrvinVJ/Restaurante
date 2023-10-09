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
        Schema::create('platos', function (Blueprint $table) {
            $table->id('IdPlato');
            $table->string('NombrePlato');
            $table->float('PrecioPlato');
            $table->unsignedBigInteger('IdCategoriaPlatos');
            $table->foreign('IdCategoriaPlatos')->references('IdCategoriaPlatos')->on('categoria_platos');
            $table->timestamps();
        });
        //Platos de Categoría Ceviche
        DB::table('platos')->insert(['NombrePlato'=>'Ceviche Mixto', 'PrecioPlato'=>'25', 'IdCategoriaPlatos'=>1]);
        DB::table('platos')->insert(['NombrePlato'=>'Ceviche de Pota', 'PrecioPlato'=>'25', 'IdCategoriaPlatos'=>1]);
        //Platos de Categoría Fondos
        DB::table('platos')->insert(['NombrePlato'=>'Sudado de Tramboyo', 'PrecioPlato'=>'30', 'IdCategoriaPlatos'=>2]);
        DB::table('platos')->insert(['NombrePlato'=>'Arroz con Mariscos', 'PrecioPlato'=>'25', 'IdCategoriaPlatos'=>2]);
        DB::table('platos')->insert(['NombrePlato'=>'Chicharron', 'PrecioPlato'=>'25', 'IdCategoriaPlatos'=>2]);
        DB::table('platos')->insert(['NombrePlato'=>'Malaya', 'PrecioPlato'=>'25', 'IdCategoriaPlatos'=>2]);
        DB::table('platos')->insert(['NombrePlato'=>'Parihuela', 'PrecioPlato'=>'30', 'IdCategoriaPlatos'=>2]);
        //Platos de Categoría Duos
        DB::table('platos')->insert(['NombrePlato'=>'Duo Marino (ceviche + chicharron)', 'PrecioPlato'=>'25', 'IdCategoriaPlatos'=>3]);
        //Platos de Categoría Trios
        DB::table('platos')->insert(['NombrePlato'=>'Trio Marino (ceviche + chicharron + arroz con marisco)', 'PrecioPlato'=>'30', 'IdCategoriaPlatos'=>4]);
        //Platos de Categoría Bebidas
        DB::table('platos')->insert(['NombrePlato'=>'Jugo de Maracuya', 'PrecioPlato'=>'10', 'IdCategoriaPlatos'=>5]);
        DB::table('platos')->insert(['NombrePlato'=>'Jugo de Naranja', 'PrecioPlato'=>'12', 'IdCategoriaPlatos'=>5]);
        DB::table('platos')->insert(['NombrePlato'=>'Cebada', 'PrecioPlato'=>'10', 'IdCategoriaPlatos'=>5]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('platos');
    }
};
