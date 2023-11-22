<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Venda;
use Dompdf\Dompdf;
use Dompdf\Options;

class PDFController extends Controller
{
    public function generatePdf($id)
    {
        $invoice = Venda::find($id);
        $user = $invoice->user;


        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnable', true);

        $pdf = new Dompdf($options);


        $html = view('fatura.pdf', compact('invoice', 'user'));



        $pdf->loadHtml($html);

        $pdf->setPaper('A4', 'portrait');

        $pdf->render();

        $pdf->stream('fatura.pdf');
    }

    public function index($id)
    {
        $invoice = Venda::find($id);
        $user = $invoice->user;
        $img = $this->dompdfImg('public/images/logoProjetoSolarTech.png');

        return view('fatura.pdf', compact('invoice', 'user', 'img'));
    }
    private function dompdfImg($img)
    {
        return "data:image/svg+xml;base64," . base64_encode(file_get_contents(base_path($img)));
    }
}
