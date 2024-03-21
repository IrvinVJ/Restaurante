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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
        DB::table('users')->insert(['name'=>'Victoria Teran Mendoza','email'=>'admin@gmail.com','password'=>bcrypt('123456789')]);
        DB::table('users')->insert(['name'=>'Nicolas Montoya Novoa','email'=>'gventas@gmail.com','password'=>bcrypt('123456789')]);
        DB::table('users')->insert(['name'=>'Wilson Montoya Novoa','email'=>'chef@gmail.com','password'=>bcrypt('123456789')]);
        DB::table('users')->insert(['name'=>'Sandra Cotrina Tafur','email'=>'asistentecocina1@gmail.com','password'=>bcrypt('123456789')]);
        DB::table('users')->insert(['name'=>'Jhonatan Teran Mendoza','email'=>'asistentecocina2@gmail.com','password'=>bcrypt('123456789')]);
        DB::table('users')->insert(['name'=>'Rosangela Merlo Becerra','email'=>'mesero@gmail.com','password'=>bcrypt('123456789')]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
