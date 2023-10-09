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
        Schema::create('detalle_ordens', function (Blueprint $table) {
            $table->id('IdDetalleOrdens');
            $table->integer('Cantidad');
            $table->unsignedBigInteger('IdOrdens');
            $table->foreign('IdOrdens')->references('IdOrdens')->on('ordens');
            $table->unsignedBigInteger('IdPlato');
            $table->foreign('IdPlato')->references('IdPlato')->on('platos');
            $table->unsignedBigInteger('IdMesa');
            $table->foreign('IdMesa')->references('IdMesa')->on('ordens');
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
