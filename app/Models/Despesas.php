<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesas extends Model
{
    use HasFactory;
    protected $fillable = ['valor', 'descricao', 'data_despesa', 'categoria', 'users_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}

