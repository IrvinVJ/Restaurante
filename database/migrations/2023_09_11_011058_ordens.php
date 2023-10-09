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
        Schema::create('ordens', function (Blueprint $table) {
            $table->id('IdOrdens');
            $table->unsignedBigInteger('IdMesa');
            $table->foreign('IdMesa')->references('IdMesa')->on('mesas');
            $table->unsignedBigInteger('IdEstadoOrdens');
            $table->foreign('IdEstadoOrdens')->references('IdEstadoOrdens')->on('estado_ordens');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('ordens');
    }
};
