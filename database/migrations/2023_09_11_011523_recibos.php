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
        Schema::create('Estado_Ventas', function (Blueprint $table) {
            $table->id('IdEstadoVentas');
            $table->string('DescripcionEstadoVentas');
            $table->timestamps();
        });
        DB::table('Estado_Ventas')->insert(['DescripcionEstadoVentas'=>'Pendiente']);
        DB::table('Estado_Ventas')->insert(['DescripcionEstadoVentas'=>'Realizada']);

        Schema::create('Tipo_Documentos', function (Blueprint $table) {
            $table->id('IdTipoDocumento');
            $table->string('DescripcionTipoDocumento');
            $table->timestamps();
        });
        DB::table('Tipo_Documentos')->insert(['DescripcionTipoDocumento'=>'Boleta']);
        DB::table('Tipo_Documentos')->insert(['DescripcionTipoDocumento'=>'Factura']);
        DB::table('Tipo_Documentos')->insert(['DescripcionTipoDocumento'=>'Recibo']);

        Schema::create('Ventas', function (Blueprint $table) {
            $table->id('IdVenta');
            $table->unsignedBigInteger('IdEstadoVentas');
            $table->foreign('IdEstadoVentas')->references('IdEstadoVentas')->on('Estado_Ventas');
            $table->unsignedBigInteger('IdDetalleOrdens');
            $table->foreign('IdDetalleOrdens')->references('IdDetalleOrdens')->on('detalle_ordens');
            $table->unsignedBigInteger('IdTipoDocumento');
            $table->foreign('IdTipoDocumento')->references('IdTipoDocumento')->on('Tipo_Documentos');
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
        Schema::drop('Estado_Ventas');
        Schema::drop('Tipo_Documentos');
        Schema::drop('Ventas');
    }
};
