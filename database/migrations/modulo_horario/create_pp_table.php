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
        Schema::create('pruebasparciales', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger('asignaturas_id');
            $table->integer('anno');
            $table->integer('semestre');
            $table->integer('dia');
            $table->integer('turno');
            $table->integer('semana');
            $table->timestamps();

            $table->foreign('asignaturas_id')->references('id')->on('asignaturas')->onDelete('cascade')->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pruebasparciales');

    }
};