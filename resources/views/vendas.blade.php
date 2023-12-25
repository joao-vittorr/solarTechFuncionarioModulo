@extends('layouts.template')

@section('content')
<div class="container">
    <div>
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
        @if(session('success'))
        <div id="resIdVendas" class="bg-warning p-4">
            {{ session('success') }}
        </div>
        @endif
    </div>
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
                    <p><strong>Pacote escolhido: </strong>{{ $venda->nomePacote }}</p>
                    <p><strong>Quantidade de placas: </strong>{{ $venda->quantidadePlacas }}</p>
                </div>
                <div class="p-1 col-md-6 themed-grid-col">
                    <p><strong class="display-7">Valor Total: R$ {{ number_format($venda->valorFinal, 2, ',', '.') }}</strong><p>
                    <form method="POST" action="{{ route('venda.deletar.cliente', ['id' => $venda->id]) }}">
                        @csrf
                        @method('DELETE')
                        <p><button type="submit" class="btn btn-danger w-100">Deletar</button></p>
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
@endsection