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
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id('IdPresupuesto');
            $table->unsignedBigInteger('IdPlato');
            $table->foreign('IdPlato')->references('IdPlato')->on('platos');
            $table->unsignedBigInteger('IdProducto');
            $table->foreign('IdProducto')->references('IdProducto')->on('productos');
            $table->decimal('Cantidad', 10, 5);
            $table->decimal('CostoTotal',10, 5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('presupuestos');
    }
};
