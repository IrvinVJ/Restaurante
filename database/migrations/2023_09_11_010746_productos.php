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
        Schema::create('Unidad_Medidas', function (Blueprint $table) {
            $table->id('IdUnidadMedida');
            $table->string('DescripcionUM');
            $table->timestamps();
        });
        DB::table('Unidad_Medidas')->insert(['DescripcionUM'=>'Unidades']);
        DB::table('Unidad_Medidas')->insert(['DescripcionUM'=>'Kg']);
        DB::table('Unidad_Medidas')->insert(['DescripcionUM'=>'Litros']);

        Schema::create('productos', function (Blueprint $table) {
            $table->id('IdProducto');
            $table->string('NombreProducto');
            $table->integer('Stock');
            $table->unsignedBigInteger('IdUnidadMedida');
            $table->foreign('IdUnidadMedida')->references('IdUnidadMedida')->on('Unidad_Medidas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('UnidadMedidas');
        Schema::drop('productos');
    }
};
