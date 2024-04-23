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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('admin_persona_id');
            $table->foreign('admin_persona_id')->references('id')->on('adm_personas');
            
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('activo')->default(true);
            $table->boolean('bloqueado')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
