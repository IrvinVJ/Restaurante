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
        Schema::create('Unidad_Medidas', function (Blueprint $table) {
            $table->id('IdUnidadMedida');
            $table->string('DescripcionUM');
            $table->timestamps();
        });
        DB::table('Unidad_Medidas')->insert(['DescripcionUM'=>'Unidades']);
        DB::table('Unidad_Medidas')->insert(['DescripcionUM'=>'Kg']);
        DB::table('Unidad_Medidas')->insert(['DescripcionUM'=>'Litros']);

        Schema::create('productos', function (Blueprint $table) {
            $table->id('IdProducto');
            $table->string('NombreProducto');
            $table->integer('Stock');
            $table->unsignedBigInteger('IdUnidadMedida');
            $table->foreign('IdUnidadMedida')->references('IdUnidadMedida')->on('Unidad_Medidas');
            $table->timestamps();
        });
        DB::table('productos')->insert(['NombreProducto'=>'Arroz', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Aceite', 'Stock'=>0, 'IdUnidadMedida'=>3]);
        DB::table('productos')->insert(['NombreProducto'=>'Aceite de Oliva', 'Stock'=>0, 'IdUnidadMedida'=>3]);
        DB::table('productos')->insert(['NombreProducto'=>'Ajo', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Sal', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Cebolla', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Aji Amarillo', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Aji Panca', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Tomate', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Oregano', 'Stock'=>0, 'IdUnidadMedida'=>1]);
        DB::table('productos')->insert(['NombreProducto'=>'Hoja de Laurel', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Achiote', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Vino Blanco', 'Stock'=>0, 'IdUnidadMedida'=>1]);
        DB::table('productos')->insert(['NombreProducto'=>'Vinagre', 'Stock'=>0, 'IdUnidadMedida'=>3]);
        DB::table('productos')->insert(['NombreProducto'=>'Mixtura de Mariscos', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Pimienta', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Pescado Tramboyo', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Pescado Bonito', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Pescado Corvina', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Culantro', 'Stock'=>0, 'IdUnidadMedida'=>1]);
        DB::table('productos')->insert(['NombreProducto'=>'Perejil', 'Stock'=>0, 'IdUnidadMedida'=>1]);
        DB::table('productos')->insert(['NombreProducto'=>'Kion', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Limon', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Pimiento', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Pota', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Malaya', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Rocoto', 'Stock'=>0, 'IdUnidadMedida'=>1]);
        DB::table('productos')->insert(['NombreProducto'=>'Mejillones', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Vieiras', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Harina', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Maracuya', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Naranja', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Cebada', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Azucar', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Papa', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Camote', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Yuca', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Chicha de Jora', 'Stock'=>0, 'IdUnidadMedida'=>3]);
        DB::table('productos')->insert(['NombreProducto'=>'Maicena', 'Stock'=>0, 'IdUnidadMedida'=>2]);
        DB::table('productos')->insert(['NombreProducto'=>'Huevos', 'Stock'=>0, 'IdUnidadMedida'=>1]);
        DB::table('productos')->insert(['NombreProducto'=>'Cerveza Negra', 'Stock'=>0, 'IdUnidadMedida'=>1]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('UnidadMedidas');
        Schema::drop('productos');
    }
};
