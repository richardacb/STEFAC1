<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('perfil', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            
            $table->string('nombre');

            $table->bigInteger('estudiante1')->unsigned();
            $table->bigInteger('estudiante2')->unsigned()->nullable();
            $table->bigInteger('profesor1')->unsigned();
            $table->bigInteger('profesor2')->unsigned()->nullable();

            $table->timestamps();

            $table->foreign('estudiante1')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('estudiante2')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('profesor1')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('profesor2')->references('id')->on('users')->onDelete('cascade');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('perfil');
    }
};
