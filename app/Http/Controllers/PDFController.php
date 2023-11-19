<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fatura;
use App\Models\User;
use App\Models\Venda;
use Dompdf\Dompdf;
use Dompdf\Options;

class PDFController extends Controller
{
    public function generatePdf($id)
    {
        $invoice = Venda::find($id);
        $user = $invoice->user;
        $pdf = new Dompdf();
        $pdf->loadHtml(view('fatura.pdf', compact('invoice','user'))->render());

        $pdf->setPaper('A4', 'portrait');

        $pdf->render();

        return $pdf->stream('fatura.pdf');
    }

    public function index($id)
    {
        $invoice = Venda::find($id);
        $user = $invoice->user;
        return view('fatura.pdf', compact('invoice', 'user'));
    }  

}