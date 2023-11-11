<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Pacotes;

class Venda extends Model
{
    protected $fillable = ['nomePacote', 'quantidadePlacas', 'valorFinal', 'users_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function fatura()
    {
        return $this->hasOne(Fatura::class);
    }
}

