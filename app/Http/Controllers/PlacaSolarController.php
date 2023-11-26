<?php

namespace App\Http\Controllers;

use App\Models\PlacaSolar;
use Illuminate\Http\Request;

class PlacaSolarController extends Controller
{
    public function index()
    {
        $placasSolares = PlacaSolar::all();
        return view('placas_solares.index', compact('placasSolares'));
    }
}
