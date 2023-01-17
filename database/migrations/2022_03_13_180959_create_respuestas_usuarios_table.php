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
        Schema::create('respuestas_usuarios', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('respuesta_id')->unsigned();
            $table->string('examen');
            $table->timestamps();

            $table->primary(['user_id', 'respuesta_id']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('respuesta_id')->references('id')->on('respuestas')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas_usuarios');
    }
};
