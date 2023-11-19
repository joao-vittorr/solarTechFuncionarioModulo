<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;
    
    protected $fillable = ['valor', 'descricao', 'data_compra', 'quantidade', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
