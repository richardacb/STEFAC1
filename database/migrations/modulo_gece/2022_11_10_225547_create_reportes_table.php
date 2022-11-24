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
        Schema::create('reportes', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            
            $table->string('nombre');


            $table->bigInteger('comite_id')->unsigned();
            $table->timestamps();


            $table->foreign('comite_id')->references('id')->on('comites')->onDelete('cascade');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes');
    }
};
