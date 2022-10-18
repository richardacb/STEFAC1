<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpOption\None;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('optativas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string('nombre', 20);
            $table->string('descripcion', 50);
            $table->unsignedBigInteger('prof_principal')->nullable();
            $table->unsignedBigInteger('prof_auxiliar')->nullable();
            $table->integer('capacidad');
            $table->integer('anno_academico');
            $table->integer('semestre');
            $table->integer('estado');
            $table->timestamps();

            //$table->foreign('estado_id')->references('id')->on('opt_estados')->onDelete('cascade')->cascadeOnUpdate();
            $table->foreign('prof_principal')->references('user_id')->on('profesores')->onDelete('cascade')->cascadeOnUpdate();
            $table->foreign('prof_auxiliar')->references('user_id')->on('profesores')->onDelete('cascade')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('optativas');
    }
};