<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
    <title>Fatura - Nº {{ $invoice->id }}</title>
</head>

<body>

    <div class="container">

        <div class="page-header">
            <h1>Fatura #{{ $invoice->id }} </h1>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 body-main">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                            <img class="img" alt="Logo" src="public/images/logoProjetoSolarTech.png" />
                            </div>
                            <div class="col-md-8 text-right">
                                <h4 style="color: #242424;"><strong>{{ $user->name }}</strong></h4>
                                <h5 style="color: #242424;"><strong>CPF: {{ $user->cpf }}</strong></h5>
                                <p>{{ $user->logradouro }}, {{ $user->numero_casa }}</p>
                                <p>{{ $user->bairro }}, {{ $user->cidade }}/{{ $user->estado }}</p>
                                <p>{{ $user->email }}</p>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2>Fatura</h2>
                                <h5>#{{ $invoice->id }}</h5>
                            </div>
                        </div>
                        <br />
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h5>Descrição</h5>
                                        </th>
                                        <th>
                                            <h5>Quantidade</h5>
                                        </th>
                                        <th>
                                            <h5>Valor</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col-md-9">Pacote</td>
                                        <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$invoice->quantidadePlacas}} </td>
                                        <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>R$ {{ number_format($invoice->valorFinal, 2, ',', '.') }} </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">
                                            <p>
                                                <strong>Resumo</strong>
                                            </p>
                                            <p>
                                                <strong>Subtotal: </strong>
                                            </p>
                                            <p>
                                                <strong>Valor Total: </strong>
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                <strong><i class="fas fa-rupee-sign" area-hidden="true"></i></strong>
                                            </p>
                                            <p>
                                                <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$invoice->quantidadePlacas}}</strong>
                                            </p>
                                            <p>
                                                <strong><i class="fas fa-rupee-sign" area-hidden="true"></i>R$ {{ number_format($invoice->valorFinal, 2, ',', '.') }} </strong>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr style="color: #272727;">
                                        <td class="text-right">
                                            <h4><strong>Total:</strong></h4>
                                        </td>
                                        <td class="text-left">
                                            <h4><strong><i class="fas fa-rupee-sign" area-hidden="true"></i> R$ {{ number_format($invoice->valorFinal, 2, ',', '.') }}</strong></h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <div class="col-md-12">
                                <p><b>Data da Compra :</b> {{ date('d/m/Y', strtotime($invoice->created_at)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('gerarPDF', ['id' => $invoice->id])}}" class="card-link">Gerar PDF</a>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEX/ndQFK4d5dI6FfO1qQ5gRVVEhfbI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-eU7ucRRXC6viV6i3Uqwe5Qb3a6P/6ucSMFkYfG/kb9pG0ehG6L8kceZ5nAiN" crossorigin="anonymous"></script>
</body>

</html>