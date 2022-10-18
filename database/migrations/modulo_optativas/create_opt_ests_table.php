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
        Schema::create('opt_ests', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->integer('id_opt');
            $table->integer('id_est');
            $table->integer('matriculado_por');
            $table->integer('estado');
            $table->integer('nota');
            $table->timestamps();


            //$table->foreign('estado_id')->references('id')->on('est_estados')->onDelete('cascade')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opt_ests');
    }
};