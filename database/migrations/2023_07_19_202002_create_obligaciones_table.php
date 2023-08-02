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
        Schema::create('obligaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('semestre');
            $table->string('año');
            $table->foreignId('fragmento')->default(1)->references('id')->on('fragmentos');
            $table->foreignId('fraccion')->references('id')->on('fracciones');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->enum('estado',['subido','aprovado','rechazado'])->default('subido');
            $table->enum('articulo',[75,76])->default(75);
            $table->string('archivo');
            $table->string('direccion');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obligaciones');
    }
};
