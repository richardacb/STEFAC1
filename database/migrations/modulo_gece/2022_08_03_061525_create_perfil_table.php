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
            $table->timestamps();

            
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('perfil');
    }
};
