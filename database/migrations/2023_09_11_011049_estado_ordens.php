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
        Schema::create('estado_ordens', function (Blueprint $table) {
            $table->id('IdEstadoOrdens');
            $table->string('DescripcionEstadoOrdens');
            $table->timestamps();
        });
        DB::table('estado_ordens')->insert(['DescripcionEstadoOrdens'=>'En Proceso']);
        DB::table('estado_ordens')->insert(['DescripcionEstadoOrdens'=>'Atendida']);
        DB::table('estado_ordens')->insert(['DescripcionEstadoOrdens'=>'Anulada']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('estado_ordens');
    }
};
