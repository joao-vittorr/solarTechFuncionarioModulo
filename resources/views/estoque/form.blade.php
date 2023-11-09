@extends('layouts.template')

@section('content')
    @if ($produto && $produto->id)
        <h1>Editar Estoque</h1>
        <form id="main" method="POST" action="{{ route('estoque.update', ['id' => $produto->id]) }}"
            enctype="multipart/form-data">
            @method('PUT')
        @else
        <h1>Criar Estoque</h1>
            <form id="main" method="POST" action="{{ route('estoque.store') }}" enctype="multipart/form-data">
    @endif

    @csrf

    <div class="form-group">
      <label for="quantidade">Quantidade</label>
      <input type="number" name="quantidade" id="quantidade" class="form-control"
          value="{{ old('quantidade', optional($produto)->quantidade) }}" required>
    </div>

    <div class="form-group">
        <label for="valor">Valor</label>
        <input type="number" name="valor" id="valor" class="form-control" step="0.01"
            value="{{ old('valor', optional($produto)->valor) }}" required>
    </div>

    <div class="form-group">
        <label for="data"> Data da Compra</label>
        <input type="date" name="data_compra" id="data_compra" class="form-control"
            value="{{ old('data_compra', optional($produto)->data_compra) }}" required>
    </div>

    <div class="form-group">
      <label for="descricao">Descrição</label>
      <input type="text" name="descricao" id="descricao" class="form-control"
          value="{{ old('descricao', optional($produto)->descricao) }}" required>
    </div>
   

    <button type="submit" class="btn btn-primary">Salvar Estoque</button>

    <a class='btn btn-secondary' href="{{ route('estoque.create') }}">
        Cadastrar Novo Estoque
    </a>

    
    </form>

    @if ($produto && $produto->id)
        <form method="POST" action="{{ route('estoque.destroy', ['id' => $produto->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
    @endif
    
    <a class='btn btn-secondary' href="{{ route('estoque.index') }}">
       Voltar
    </a>
    
@endsection
