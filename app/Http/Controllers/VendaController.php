<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venda;

class VendaController extends Controller
{
    public function vendas()
    {
        $vendas = Venda::all();

        return view('vendas', ['vendas' => $vendas]);
    }
}

