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
        Schema::create('estado_mesas', function (Blueprint $table) {
            $table->id('IdEstadoMesas');
            $table->string('DescripcionEstadoMesas');
            $table->timestamps();
        });
        DB::table('estado_mesas')->insert(['DescripcionEstadoMesas'=>'Libre']);
        DB::table('estado_mesas')->insert(['DescripcionEstadoMesas'=>'Ocupada']);
        DB::table('estado_mesas')->insert(['DescripcionEstadoMesas'=>'Reservada']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('estado_mesas');
    }
};
