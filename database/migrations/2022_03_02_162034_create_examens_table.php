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
        Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('nivel')->enum('basico', 'medio', 'avanzado');
            $table->integer('num_preguntas');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->bigInteger('materia_id')->unsigned();
            $table->bigInteger('curso_id')->unsigned();
            $table->timestamps();

            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examens');
    }
};
