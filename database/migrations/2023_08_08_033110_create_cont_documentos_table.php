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
        Schema::create('cont_documentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('tipo',["Información contable","Información presupuestaria", "Información programática","Otra Información de la Ley General de Contabilidad Gubernamental "])->default("Información contable");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cont_documentos');
    }
};
