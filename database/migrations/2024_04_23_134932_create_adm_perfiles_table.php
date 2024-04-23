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
        Schema::create('adm_perfiles', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('adm_rol_id');
            $table->foreign('adm_rol_id')->references('id')->on('adm_roles');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('usuarios');

            $table->boolean('activo')->default(true);
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adm_perfiles');
    }
};
