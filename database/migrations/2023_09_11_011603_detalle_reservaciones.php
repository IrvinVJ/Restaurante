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
        Schema::create('detalle_reservaciones', function (Blueprint $table) {
            $table->id('IdDetalleReservacion');
            $table->unsignedBigInteger('IdReservacion');
            $table->foreign('IdReservacion')->references('IdReservacion')->on('reservaciones');
            $table->unsignedBigInteger('IdDetalleOrdens');
            $table->foreign('IdDetalleOrdens')->references('IdDetalleOrdens')->on('detalle_ordens');
            $table->unsignedBigInteger('IdCliente');
            $table->foreign('IdCliente')->references('IdCliente')->on('reservaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('detalle_reservaciones');
    }
};
