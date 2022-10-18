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
        Schema::create('diagnosticopreventivo', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('nacionalidad');
            $table->string('adicciones_Alcohol')->nullable();
            $table->string('adicciones_Tabaco')->nullable();
            $table->string('adicciones_Café')->nullable();
            $table->string('adicciones_Tecnoadicciones')->nullable();
            $table->string('adicciones_Drogas')->nullable();
            $table->string('tipo_medicamentos')->nullable();
            $table->string('tipo_medicamentos_consumo')->nullable();
            $table->string('grupo_social')->nullable();
            $table->string('creencia_religiosa')->nullable();
            $table->string('tipos_de_problemas')->nullable();
            $table->timestamps();

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
        //
    }
};
