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
        Schema::create('opiniones', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_expediente')->unsigned();
            $table->string('Nombre',40);
            $table->string('responsabilidad',40);
            $table->string('descripcion',200);
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
        Schema::dropIfExists('opiniones');
    }
};
