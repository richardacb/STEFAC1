<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('comites', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            
            $table->string('nombre');
           
            $table->bigInteger('estudiante_id')->unsigned();
            $table->bigInteger('profesor_id')->unsigned();

            $table->timestamps();

            $table->foreign('estudiante_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('profesor_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    
    public function down()
    {
        Schema::dropIfExists('comites');
    }
};
