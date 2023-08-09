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
        Schema::create('cont_obligaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('notas');
            $table->enum('trimestre',['1','2','3','4'])->default('1');
            $table->string('año');
            $table->foreignId('fragmento')->default(1)->references('id')->on('fragmentos');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('cont_documento')->references('id')->on('cont_documentos');
            $table->enum('estado',['subido','aprobado','rechazado'])->default('subido');
            $table->string('archivo');
            $table->string('direccion');

            $table->engine = 'InnoDB';
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('cont_obligaciones');
    }
};
