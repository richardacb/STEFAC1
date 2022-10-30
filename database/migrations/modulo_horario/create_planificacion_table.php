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
        Schema::create('planificacions', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger('profesores_id')->nullable();
            $table->unsignedBigInteger('asignaturas_id');
            $table->unsignedBigInteger('grupos_id');

            $table->timestamps();

            $table->foreign('asignaturas_id')->references('id')->on('asignaturas')->onDelete('cascade')->cascadeOnUpdate();
            $table->foreign('grupos_id')->references('id')->on('grupos')->onDelete('cascade')->cascadeOnUpdate();
            $table->foreign('profesores_id')->references('user_id')->on('profesores')->onDelete('cascade')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planificacions');

    }
};