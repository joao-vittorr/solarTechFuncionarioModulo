@extends('layouts.template')

@section('content')
<div class="container">
    <h1 class="mt-4">{{ __('Expenses') }}</h1>
    <a href="{{route('despesas.create')}}" class="btn btn-block btn-info">
        Criar Nova Despesa
    </a>
    <p>
    <form method="GET" action="{{ route('despesas.index') }}">
        <div class="input-group">
            <input type="text" name="categoria" placeholder="Buscar por categoria" value="{{ $categoria ?? '' }}">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>
    </p>
    @foreach ($despesas as $despesa)
    <br />
    <div class="row mb-3 text-center border border-2 rounded">
        <div class="pb-1 col-md-6 themed-grid-col">
            <p><strong>Descrição: </strong>{{ $despesa->descricao }}</p>
            <p><strong>Valor: </strong>R$ {{ number_format($despesa->valor, 2, ',', '.') }}</p>
        </div>
        <div class="col-md-6 themed-grid-col">
            <div class="row">
                <div class="p-1 col-md-6 themed-grid-col">
                    <strong>Categoria: </strong>{{ $despesa->categoria->nome }}
                </div>
                <div class="p-1 col-md-6 themed-grid-col">
                    <strong>Data: </strong>{{ date('d/m/Y', strtotime($despesa->data_despesa)) }}
                </div>
                <div class="p-1 col-md-6 themed-grid-col">
                    <a href="{{route("despesas.edit",$despesa)}}" class="btn btn-block btn-info w-100">Editar</a>
                </div>
                <div class="p-1 col-md-6 themed-grid-col">
                    <form method="POST" action="{{ route('despesas.destroy', ['id' => $despesa->id]) }}">
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
        {{ $despesas->links('components.pagination') }}
    </div>
</div>
@endsection