<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fatura extends Model
{
    protected $fillable = [
        'venda_id', 'valor', 'pago',
    ];

    public function venda()
    {
        return $this->belongsTo(Venda::class);
    }
}
