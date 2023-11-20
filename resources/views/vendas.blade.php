@extends('layouts.template')

@section('content')
    <div class="container">
        <h1 class="mt-4">Produtos vendidos</h1>
        <p>
        <form action="{{ route('venda.mostrar') }}" method="GET">
            <input type="text" name="tipoPacote" placeholder="Tipo de Pacote" value="{{ $tipoPacote ?? '' }}">
            <input type="text" name="cpfUsuario" placeholder="CPF do Usuário" value="{{ $cpfUsuario ?? '' }}">
            <button type="submit">Buscar</button>
        </form>
        </p>
        @foreach ($dadosVendas as $venda)
            <br />
            <div class="row mb-3 text-center border border-2 rounded">
                <div class="pb-1 col-md-6 themed-grid-col">
                    <p><strong>Nome do Usuário: </strong>{{ $venda->user->name }}</p>
                    <p><strong>CPF: </strong>{{ $venda->user->cpf }}</p>
                </div>
                <div class="col-md-6 themed-grid-col">
                    <div class="row">
                        <div class="p-1 col-md-6 themed-grid-col">
                            <strong>Pacote escolhido: </strong>{{ $venda->nomePacote }}
                        </div>
                        <div class="p-1 col-md-6 themed-grid-col">
                            <strong>Quantidade de placas: </strong>{{ $venda->quantidadePlacas }} - Valor total: R$
                            {{ number_format($venda->valorFinal, 2, ',', '.') }}
                        </div>
                        <div class="p-1 col-md-6 themed-grid-col">
                            <a href="#" class="card-link btn btn-primary visualizar-pdf" data-toggle="modal"
                                data-target="#myModal" data-id="{{ $venda->id }}" data-nome="{{ $venda->user->name }}"
                                data-cpf="{{ $venda->user->cpf }}" data-logradouro="{{ $venda->user->logradouro }}"
                                data-numero-casa="{{ $venda->user->numero_casa }}"
                                data-bairro="{{ $venda->user->bairro }}" data-cidade="{{ $venda->user->cidade }}"
                                data-estado="{{ $venda->user->estado }}" data-email="{{ $venda->user->email }}"
                                data-nome-pacote="{{ $venda->nomePacote }}"
                                data-quantidade-placas="{{ $venda->quantidadePlacas }}"
                                data-valor-final="{{ number_format($venda->valorFinal, 2, ',', '.') }}"
                                data-compra-data="{{ date('d/m/Y', strtotime($venda->created_at)) }}">
                                Visualizar PDF
                            </a>

                        </div>
                        <div class="p-1 col-md-6 themed-grid-col">
                            <form method="POST" action="{{ route('venda.deletar', ['id' => $venda->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100">Deletar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4 pagination">
            {{ $dadosVendas->links('components.pagination') }}
        </div>
    </div>
    <!-- /.content -->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-end">
                    <button type="button" class="close btn btn-danger " data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 body-main">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img class="img-fluid" alt="Logo"
                                                src={{ asset('images/logoProjetoSolarTech.png') }} />
                                        </div>
                                        <div class="col-md-8 text-right">
                                            <h4 style="color: #242424;"><strong>{{ $venda->user->name }}</strong></h4>
                                            <h5 style="color: #242424;"><strong>CPF: {{ $venda->user->cpf }}</strong></h5>
                                            <p>{{ $venda->user->logradouro }}, {{ $venda->user->numero_casa }}</p>
                                            <p>{{ $venda->user->bairro }},
                                                {{ $venda->user->cidade }}/{{ $venda->user->estado }}
                                            </p>
                                            <p>{{ $venda->user->email }}</p>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h2>Fatura</h2>
                                            <h5>#{{ $venda->id }}</h5>
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
                                                    <td class="col-md-9">{{ $venda->nomePacote }}</td>
                                                    <td class="col-md-3"> {{ $venda->quantidadePlacas }} </td>
                                                    <td class="col-md-3">R$
                                                        {{ number_format($venda->valorFinal, 2, ',', '.') }}
                                                    </td>
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
                                                            <strong> </strong>
                                                        </p>
                                                        <p>
                                                            <strong>{{ $venda->quantidadePlacas }}</strong>
                                                        </p>
                                                        <p>
                                                            <strong>R$ {{ number_format($venda->valorFinal, 2, ',', '.') }}
                                                            </strong>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr style="color: #272727;">
                                                    <td class="text-right">
                                                        <h4><strong>Total:</strong></h4>
                                                    </td>
                                                    <td class="text-left">
                                                        <h4><strong> R$
                                                                {{ number_format($venda->valorFinal, 2, ',', '.') }}</strong>
                                                        </h4>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div>
                                        <div class="col-md-12">
                                            <p><b>Data da Compra :</b> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
