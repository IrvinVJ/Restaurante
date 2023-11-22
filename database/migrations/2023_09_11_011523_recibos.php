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
        Schema::create('estado_ventas', function (Blueprint $table) {
            $table->id('IdEstadoVentas');
            $table->string('DescripcionEstadoVentas');
            $table->timestamps();
        });
        DB::table('estado_ventas')->insert(['DescripcionEstadoVentas'=>'Pendiente']);
        DB::table('estado_ventas')->insert(['DescripcionEstadoVentas'=>'Realizada']);

        Schema::create('tipo_documentos', function (Blueprint $table) {
            $table->id('IdTipoDocumento');
            $table->string('DescripcionTipoDocumento');
            $table->timestamps();
        });
        DB::table('tipo_documentos')->insert(['DescripcionTipoDocumento'=>'Boleta']);
        DB::table('tipo_documentos')->insert(['DescripcionTipoDocumento'=>'Factura']);
        DB::table('tipo_documentos')->insert(['DescripcionTipoDocumento'=>'Recibo']);

        Schema::create('Ventas', function (Blueprint $table) {
            $table->id('IdVenta');
            $table->string('Serie');
            $table->string('Correlativo');
            $table->unsignedBigInteger('IdEstadoVentas');
            $table->foreign('IdEstadoVentas')->references('IdEstadoVentas')->on('estado_ventas');
            $table->unsignedBigInteger('IdOrdens');
            $table->foreign('IdOrdens')->references('IdOrdens')->on('ordens');
            $table->unsignedBigInteger('IdTipoDocumento');
            $table->foreign('IdTipoDocumento')->references('IdTipoDocumento')->on('tipo_documentos');
            $table->timestamps();
        });

        /*Schema::create('recibos', function (Blueprint $table) {
            $table->id('IdRecibo');
            $table->unsignedBigInteger('IdVenta');
            $table->foreign('IdVenta')->references('IdVenta')->on('Ventas');
            $table->float('MontoTotal');
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('estado_ventas');
        Schema::drop('tipo_documentos');
        Schema::drop('Ventas');
    }
};
