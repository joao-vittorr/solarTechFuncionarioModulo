@extends('layouts.template')

@section('content')
<div class="container">
    <div>
        <div class="mt-4 d-flex justify-content-between">
            <h1>{{ __('Expenses') }}</h1>
            <p>
            <a href="{{ route('despesas.create') }}" id="criarDespesa" class="btn btn-info">
                    <b> + Despesas </b>
                </a>
            </p>
        </div>
        @if(session('success'))
        <div id="resIdDespesa" class="bg-warning p-4">
            {{ session('success') }}
        </div>
        @endif
        <br/>
    </div>
    <div>
        <form method="GET" action="{{ route('despesas.index') }}">
            <div class="input-group">
                <select name="categoria" class="form-control">
                    <option value="" selected>Selecione uma opção</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $categoria->id == $categoriaSelecionada ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>
    </div>

    @forelse($despesas as $despesa)
    <br />
    <div class="row mb-3 text-center border border-2 rounded">
        <div class="pb-1 col-md-6 themed-grid-col">
            <p id="desc_despesa"><strong>Descrição: </strong>{{ $despesa->descricao }}</p>
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
                    <a href="{{ route('despesas.edit', $despesa) }}" class="btn btn-block btn-info w-100">Editar</a>
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
    @empty
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="text-center">
                <p>Nenhuma Despesa cadastrada!</p>
        </div>
    </div>
    @endforelse
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4 pagination">
        {{ $despesas->links('components.pagination') }}
    </div>
</div>
@endsection