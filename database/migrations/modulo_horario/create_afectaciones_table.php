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
        Schema::create('afectaciones', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger('profesores_afectados_id');
            $table->unsignedBigInteger('profesores_suplentes_id');
            $table->integer('dia');
            $table->integer('semana');
            $table->integer('turno');
            $table->integer('anno');
            $table->timestamps();

            $table->foreign('profesores_afectados_id')->references('user_id')->on('profesores');
            $table->foreign('profesores_suplentes_id')->references('user_id')->on('profesores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afectaciones');

    }
};