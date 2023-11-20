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

        // Criar um objeto Options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnable', true);

        $pdf = new Dompdf($options);

        // Renderizar o conteúdo da visão em HTML
        $html = view('fatura.pdf', compact('invoice', 'user'))->render();
        
        // Carregar o HTML no objeto Dompdf
        $pdf->loadHtml($html);
        
        // (opcional) Configurar o tamanho do papel e a orientação
        $pdf->setPaper('A4', 'portrait');
        
        // Renderizar o PDF
        $pdf->render();
        
        // Enviar o PDF para o navegador (stream)
        $pdf->stream('fatura.pdf');
    }

    public function index($id)
    {
        $invoice = Venda::find($id);
        $user = $invoice->user;
        return view('fatura.pdf', compact('invoice', 'user'));
    }
}
