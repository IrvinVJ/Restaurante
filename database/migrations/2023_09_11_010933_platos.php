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
        Schema::create('platos', function (Blueprint $table) {
            $table->id('IdPlato');
            $table->string('NombrePlato');
            $table->float('PrecioPlato');
            $table->unsignedBigInteger('IdCategoriaPlatos');
            $table->foreign('IdCategoriaPlatos')->references('IdCategoriaPlatos')->on('categoria_platos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('platos');
    }
};
