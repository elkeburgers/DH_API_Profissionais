<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProfissionaisTecnologias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profissionais_tecnologias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('profissional_id');
            // $table->foreign('profissional_id')->references('id')->on('profissionais')->onDelete('cascade');
            $table->foreign('profissional_id')->references('id')->on('profissionais');
            $table->unsignedBigInteger('tecnologia_id');
            $table->foreign('tecnologia_id')->references('id')->on('tecnologias');
            $table->timestamps();
        });
        // ->onDelete(cascade): para poder deletar o campo com todas as informacoes de relacionadas a ele. Na teoria nao poderiamos colocar, porque ele  vai deletar a tecnologia junto.
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profissionais_tecnologias');
    }
}
