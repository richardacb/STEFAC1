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
        Schema::create('profesores', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->integer('periodo_lectivo');
            $table->unsignedBigInteger('grupos_id')->nullable();
            $table->string('tipo_de_clases');
            $table->unsignedBigInteger('asignaturas_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->cascadeOnUpdate();
            $table->foreign('grupos_id')->references('id')->on('grupos')->onDelete('cascade')->cascadeOnUpdate();
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
        //
    }
};