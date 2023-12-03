@extends('layouts.template')

@section('content')
<div class="container">
    <h1 class="mt-4">Produtos vendidos</h1>
    <p>
    <form action="{{ route('venda.mostrar') }}" method="GET" class="row g-3">
        <div class="col-4">
            <input type="text" name="tipoPacote" placeholder="Tipo de Pacote" value="{{ $tipoPacote ?? '' }}" class="form-control">
        </div>
        <div class="col-2">
            <input type="text" name="cpfUsuario" placeholder="CPF do Usuário" value="{{ $cpfUsuario ?? '' }}" class="form-control">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
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
                    <a href="#" class="card-link btn btn-primary visualizar-pdf w-100" data-toggle="modal" data-target="#myModal" data-id="{{ $venda->id }}" data-nome="{{ $venda->user->name }}" data-cpf="{{ $venda->user->cpf }}" data-logradouro="{{ $venda->user->logradouro }}" data-numero-casa="{{ $venda->user->numero_casa }}" data-bairro="{{ $venda->user->bairro }}" data-cidade="{{ $venda->user->cidade }}" data-estado="{{ $venda->user->estado }}" data-email="{{ $venda->user->email }}" data-nome-pacote="{{ $venda->nomePacote }}" data-quantidade-placas="{{ $venda->quantidadePlacas }}" data-valor-final="{{ number_format($venda->valorFinal, 2, ',', '.') }}" data-compra-data="{{ date('d/m/Y', strtotime($venda->created_at)) }}">
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


<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

</div>
@endsection