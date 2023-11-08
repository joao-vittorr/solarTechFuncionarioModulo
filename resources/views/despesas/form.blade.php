@extends('layouts.template')

@section('content')
    @if ($despesa && $despesa->id)
        <form id="main" method="POST" action="{{ route('despesas.update', ['id' => $despesa->id]) }}"
            enctype="multipart/form-data">
            @method('PUT')
        @else
            <form id="main" method="POST" action="{{ route('despesas.store') }}" enctype="multipart/form-data">
    @endif

    @csrf

    <div class="form-group">
        <label for="descricao">Descrição da Despesa</label>
        <input type="text" name="descricao" id="descricao" class="form-control"
            value="{{ old('descricao', optional($despesa)->descricao) }}" required>
    </div>

    <div class="form-group">
        <label for="valor">Valor</label>
        <input type="number" name="valor" id="valor" class="form-control" step="0.01"
            value="{{ old('valor', optional($despesa)->valor) }}" required>
    </div>

    <div class="form-group">
        <label for="data"> Data da Despesa</label>
        <input type="date" name="data" id="data" class="form-control"
            value="{{ old('data_despesa', optional($despesa)->data_despesa) }}" required>
    </div>

    <div class="form-group">
        <label for="categoria">Categoria da Despesa</label>
        <select name="categoria" id="categoria" class="form-control" required>
            <option value="alimentacao">Alimentação</option>
            <option value="moradia">Moradia</option>
            <option value="transporte">Transporte</option>
            <option value="educacao">Educação</option>
            <option value="outra">Outra</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Salvar Despesa</button>

    <a class='btn btn-secondary' href="{{ route('despesas.create') }}">
        Cadastrar Nova Despesa
    </a>

    </form>

    @if ($despesa && $despesa->id)
        <form method="POST" action="{{ route('despesas.destroy', ['id' => $despesa->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
    @endif
@endsection
