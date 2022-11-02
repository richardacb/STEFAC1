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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('grupos_id');
            $table->integer('periodo_lectivo');
            $table->string('tipo_curso');
            $table->string('plan_estudio');
            $table->string('organizacion_pe');
            $table->string('via_ingreso');
            $table->string('situacion_escolar');
            $table->string('situacion_militar')->nullable();
            $table->string('cohorte_estudiantil');
            $table->string('centro_trabajo')->nullable();
            $table->string('discapacidad')->nullable();
            $table->string('tipo_estudiante');
            $table->text('direccion_completa');
            $table->string('nombre_madre');
            $table->string('organizacion_politica')->nullable();
            $table->string('opcion_uci')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->cascadeOnUpdate();
            $table->foreign('grupos_id')->references('id')->on('grupos')->onDelete('cascade')->cascadeOnUpdate();

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