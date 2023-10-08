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
            $table->unsignedBigInteger('IdIngreso');
            $table->foreign('IdIngreso')->references('IdIngreso')->on('ingresos');
            $table->unsignedBigInteger('IdProducto');
            $table->foreign('IdProducto')->references('IdProducto')->on('productos');
            $table->integer('Cantidad');
            $table->float('CostoUnitario');
            $table->float('CostoTotal');
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
