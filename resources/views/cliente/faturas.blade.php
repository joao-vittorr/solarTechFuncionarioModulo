<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Suas Faturas</h1>

    @foreach ($vendas as $venda)
    <h3>Venda ID: {{ $venda->id }}</h3>
    <p>Nome do Pacote: {{ $venda->nomePacote }}</p>
    <p>Quantidade de Placas: {{ $venda->quantidadePlacas }}</p>
    <p>Valor Total: R$ {{ $venda->valorFinal }}</p>

    @if ($venda->fatura)
    <p>Status de Pagamento: {{ $venda->fatura->pago ? 'Pago' : 'Não Pago' }}</p>
    @else
    <p>Fatura não disponível</p>
    @endif

    <hr>
    @endforeach
</body>

</html>