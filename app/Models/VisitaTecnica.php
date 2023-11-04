<?php

// VisitaTecnica.php (app\Models\VisitaTecnica.php)
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitaTecnica extends Model
{
    protected $fillable = ['user_id', 'detalhes', 'data_agendada', 'necessita_visita'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}