<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('usuario');
            $table->string('password');
            $table->timestamps();
        });
        Schema::create('local', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('direccion');
            $table->unsignedBigInteger('encargado_id');
            $table->foreign('encargado_id')->references('id')->on('usuario');
            $table->timestamps();
        });
        Schema::create('categoria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('categoria');
            $table->timestamps();
        });
        Schema::create('producto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->integer('stock');
            $table->unsignedBigInteger('id_local');
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_local')->references('id')->on('local');
            $table->foreign('id_categoria')->references('id')->on('categoria');
            $table->timestamps();
        });
        Schema::create('ingreso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_ingreso');
            $table->integer('cantidad_ingreso');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_local');
            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_usuario')->references('id')->on('usuario');
            $table->foreign('id_local')->references('id')->on('local');
            $table->foreign('id_producto')->references('id')->on('producto');
            $table->timestamps();
        });
        Schema::create('retiro', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_retiro');
            $table->integer('cantidad_retiro');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_local');
            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_usuario')->references('id')->on('usuario');
            $table->foreign('id_local')->references('id')->on('local');
            $table->foreign('id_producto')->references('id')->on('producto');
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
        Schema::dropIfExists('usuario');
    }
}
