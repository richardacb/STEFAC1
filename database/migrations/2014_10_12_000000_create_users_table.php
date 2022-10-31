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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ci');
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->string('tipo_de_usuario');
            $table->string('username');
            $table->longText('password');
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('sexo')->nullable();
            $table->integer('anno')->nullable();
            $table->string('municipio')->nullable();
            $table->string('provincia')->nullable();
            $table->string('color_piel')->nullable();
            $table->string('telefono_casa')->nullable();
            $table->string('telefono_uci')->nullable();
            $table->string('celular')->nullable();
            $table->string('solapin')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};