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
        Schema::create('categoria_platos', function (Blueprint $table) {
            $table->id('IdCategoriaPlatos');
            $table->string('NombreCategoriaPlato');
            $table->timestamps();
        });
        DB::table('categoria_platos')->insert(['NombreCategoriaPlato'=>'Ceviches']);
        DB::table('categoria_platos')->insert(['NombreCategoriaPlato'=>'Fondos']);
        DB::table('categoria_platos')->insert(['NombreCategoriaPlato'=>'Duos']);
        DB::table('categoria_platos')->insert(['NombreCategoriaPlato'=>'Trios']);
        DB::table('categoria_platos')->insert(['NombreCategoriaPlato'=>'Bebidas']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('categoria_platos');
    }
};
