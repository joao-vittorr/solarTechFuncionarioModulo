<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas'; // Define o nome da tabela

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'cep',
        'numero_casa',
        'logradouro',
        'bairro',
        'cidade',
        'estado',
        'access_level',
        'email_verified_at',
        // Se você utilizar 'timestamps' do Laravel, não é necessário adicionar 'created_at' e 'updated_at' aqui
    ];

    // Se houver necessidade de adicionar relações ou métodos no modelo, pode ser feito aqui
}
