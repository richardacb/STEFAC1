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
        Schema::create('dictamen', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_expediente')->unique();
            $table->string('hechos',200);
            $table->string('atenuantes',200);
            $table->string('agravantes',200);
            $table->string('resultadosexpacd',200);
            $table->string('tipofalta',40);
            $table->string('medida',200);
            $table->timestamps();
            $table->foreign('id_expediente')->references('id')->on('expediente')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dictamen');
    }
};
