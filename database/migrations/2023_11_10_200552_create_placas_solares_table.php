<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacasSolaresTable extends Migration
{
    public function up()
    {
        Schema::create('placas_solares', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade')->default(0); // Adicionando um valor padrão de 0
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('placas_solares');
    }
}
