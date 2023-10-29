<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nome_clientes',
        'cpf_clientes',
        'email_clientes',
        'senha_clientes',
        'cep_clientes',
        'logradouro_clientes',
        'bairro_clientes',
        'cidade_clientes',
        'estado_clientes',
    ];

    //implementar dps a logica do cep
    
}