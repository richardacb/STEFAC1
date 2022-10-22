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
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger('disponibilidad_id');
            $table->unsignedBigInteger('planificacion_id');
            $table->integer('anno');
            $table->integer('semana');
            $table->integer('estado');
            $table->timestamps();

            $table->foreign('planificacion_id')->references('id')->on('planificacions')->onDelete('cascade')->cascadeOnUpdate();
            $table->foreign('disponibilidad_id')->references('id')->on('disponibilidad')->onDelete('cascade')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignaciones');

    }
};