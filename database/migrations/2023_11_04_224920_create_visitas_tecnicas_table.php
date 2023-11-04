<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitasTecnicasTable extends Migration
{
    public function up()
    {
        Schema::create('visita_tecnicas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('detalhes');
            $table->dateTime('data_agendada');
            $table->boolean('necessita_visita');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visitas_tecnicas');
    }
}

