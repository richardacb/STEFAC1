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
        Schema::create('afect_planif', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger('afectaciones_id');
            $table->unsignedBigInteger('planificacions_id');
            $table->timestamps();

            $table->foreign('afectaciones_id')->references('id')->on('afectaciones')->onDelete('cascade')->cascadeOnUpdate();
            $table->foreign('planificacions_id')->references('id')->on('planificacions')->onDelete('cascade')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afect_planif');

    }
};