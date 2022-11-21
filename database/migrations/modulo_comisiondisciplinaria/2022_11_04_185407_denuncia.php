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
        //

        Schema::create('denuncia', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_comision')->unsigned()->nullable();
            $table->string('Nombre_denunciante',40);
            $table->string('descripcion',400);
            $table->string('estado',40);
            $table->timestamps();
            $table->foreign('id_comision')->references('id')->on('comision__disciplinarias')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('denuncia');
    }
};
