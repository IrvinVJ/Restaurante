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
        Schema::create('mesas', function (Blueprint $table) {
            $table->id('IdMesa');
            $table->unsignedBigInteger('IdEstadoMesas');
            $table->foreign('IdEstadoMesas')->references('IdEstadoMesas')->on('estado_mesas');
            $table->timestamps();
        });
        DB::table('mesas')->insert(['IdEstadoMesas'=>1]);
        DB::table('mesas')->insert(['IdEstadoMesas'=>1]);
        DB::table('mesas')->insert(['IdEstadoMesas'=>1]);
        DB::table('mesas')->insert(['IdEstadoMesas'=>1]);
        DB::table('mesas')->insert(['IdEstadoMesas'=>1]);
        DB::table('mesas')->insert(['IdEstadoMesas'=>2]);
        DB::table('mesas')->insert(['IdEstadoMesas'=>2]);
        DB::table('mesas')->insert(['IdEstadoMesas'=>2]);
        DB::table('mesas')->insert(['IdEstadoMesas'=>3]);
        DB::table('mesas')->insert(['IdEstadoMesas'=>3]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('mesas');
    }
};
