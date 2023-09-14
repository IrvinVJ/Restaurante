<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_ingresos', function (Blueprint $table) {
            $table->id('IdDetalleIngreso');
            $table->integer('IdProducto');
            //$table->foreign('IdProducto')->references('IdProducto')->on('productos');
            $table->integer('IdIngreso');
            //$table->foreign('IdIngreso')->references('IdIngreso')->on('ingresos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('detalle_ingresos');
    }
};
