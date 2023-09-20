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
        DB::table('users')->insert(['name'=>'Jhosep','email'=>'admin@gmail.com','password'=>bcrypt('123456789')]);
        DB::table('users')->insert(['name'=>'Jorge','email'=>'gventas@gmail.com','password'=>bcrypt('123456789')]);
        DB::table('users')->insert(['name'=>'Jose','email'=>'chef@gmail.com','password'=>bcrypt('123456789')]);
        DB::table('users')->insert(['name'=>'Julio','email'=>'asistentecocina1@gmail.com','password'=>bcrypt('123456789')]);
        DB::table('users')->insert(['name'=>'Joao','email'=>'asistentecocina2@gmail.com','password'=>bcrypt('123456789')]);
        DB::table('users')->insert(['name'=>'Juan','email'=>'mesero@gmail.com','password'=>bcrypt('123456789')]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
