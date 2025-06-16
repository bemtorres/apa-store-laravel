<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tienda', function (Blueprint $table) {
          $table->id();
          $table->string('dominio')->unique();
          $table->string('img')->nullable();
          $table->string('icon')->nullable();
          $table->string('nombre');
          $table->string('descripcion')->nullable();
          $table->json('integrations')->nullable();
          $table->json('info')->nullable();
          $table->foreignId('id_usuario')->references('id')->on('usuario');
          $table->boolean('activo')->default(true);
          $table->timestamps();
        });

        Schema::create('articulo', function (Blueprint $table) {
          $table->id();
          $table->string('idi')->nullable();
          $table->string('codigo')->nullable();
          $table->string('nombre');
          $table->string('descripcion')->nullable();
          $table->string('img')->nullable();
          $table->integer('precio')->default(0);
          $table->foreignId('id_usuario')->references('id')->on('usuario');
          $table->foreignId('id_tienda')->references('id')->on('tienda');
          $table->boolean('activo')->default(true);
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo');
    }
};
