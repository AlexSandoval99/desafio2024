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
        Schema::create('adm_documentos', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('admin_persona_id');
            $table->foreign('admin_persona_id')->references('id')->on('adm_personas');

            $table->string('numero');
            $table->boolean('es_principal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adm_documentos');
    }
};
