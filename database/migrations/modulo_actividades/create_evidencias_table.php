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
        Schema::create('evidencias', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger('actividades_id');
            $table->unsignedBigInteger('user_id');
            $table->string('descripcion');
            $table->integer('estado');
            $table->string('imagen')->nullValue();
            $table->timestamps();

            $table->foreign('actividades_id')->references('id')->on('actividades')->onDelete('cascade')->cascadeOnUpdate();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evidencias');
    }
};
