<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('faturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venda_id'); // Campo para armazenar o ID da venda
            $table->decimal('valor', 10, 2);
            $table->boolean('pago')->default(false);
            $table->timestamps();
        });
    } 
    public function down(): void
    {
        Schema::dropIfExists('faturas');
    }
};
