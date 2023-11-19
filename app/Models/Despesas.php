<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesas extends Model
{
    use HasFactory;
    protected $fillable = ['valor_despesas', 'descricao_despesas', 'data_despesa', 'categoria_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }
}

