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
        Schema::create('realizarexamens', function (Blueprint $table) {
            $table->bigInteger('examen_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->date('fecha_realizada');
            $table->integer('nota');
            $table->timestamps();

            $table->primary(['examen_id', 'user_id']);

            $table->foreign('examen_id')->references('id')->on('examens')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realizarexamens');
    }
};
