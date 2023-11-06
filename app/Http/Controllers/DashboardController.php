<?php

namespace App\Http\Controllers;
use App\Models\Venda;

class DashboardController extends Controller
{


    public function index(){
        return view('dashboard/index');
    }

}
