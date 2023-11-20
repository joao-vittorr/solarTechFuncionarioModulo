@extends('layouts.template')

@section('content')
    <div class="container">
        <h1>Detalhes da Fatura</h1>
        <p>Número da Fatura: {{ $faturas->venda_id }}</p>
        <p>Cliente: {{ $faturas->pago }}</p>
        <p>Total: R$ {{ $faturas->valor }}</p>
        <!-- Adicione mais detalhes conforme necessário -->
    </div>
@endsection