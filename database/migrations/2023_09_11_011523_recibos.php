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
        Schema::create('recibos', function (Blueprint $table) {
            $table->id('IdRecibo');
            $table->unsignedBigInteger('IdDetalleOrdens');
            $table->foreign('IdDetalleOrdens')->references('IdDetalleOrdens')->on('detalle_ordens');
            $table->float('MontoTotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
