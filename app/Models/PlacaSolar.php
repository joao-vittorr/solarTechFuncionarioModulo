<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PlacaSolar extends Model
{
    use HasFactory;
    protected $table = 'placas_solares';
    protected $fillable = ['quantidade'];
}
