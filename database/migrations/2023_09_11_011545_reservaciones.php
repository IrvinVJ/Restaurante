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
        Schema::create('reservaciones', function (Blueprint $table) {
            $table->id('IdReservacion');
            $table->unsignedBigInteger('IdCliente');
            $table->foreign('IdCliente')->references('IdCliente')->on('clientes');
            $table->date('Fecha');
            $table->time('Hora');
            $table->integer('NroPersonas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('reservaciones');
    }
};
