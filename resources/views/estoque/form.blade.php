@extends('layouts.template')

@section('content')
    @if ($produto && $produto->id)
        <div class="container">
        <h1>Editar Estoque</h1>
        <form id="main" method="POST" action="{{ route('estoque.update', ['id' => $produto->id]) }}" enctype="multipart/form-data">
            @method('PUT')
    @else
        <div class="container">
        <h1>Criar Estoque</h1>
        <form id="main" method="POST" action="{{ route('estoque.store') }}" enctype="multipart/form-data">
    @endif
            <div class="row">
                @csrf
                <div class="mb-3 col-12">
                    <label for="descricao">Descrição</label>
                    <textarea type="text" name="descricao" id="descricao" class="form-control"  required>{{ old('descricao', optional($produto)->descricao) }}</textarea>
                </div>

                <div class="mb-3 col-6">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quantidade" id="quantidade" class="form-control" value="{{ old('quantidade', optional($produto)->quantidade) }}" required>
                </div>

                <div class="mb-3 col-6">
                    <label for="valor">Valor</label>
                    <input type="number" name="valor" id="valor" class="form-control" step="0.01" value="{{ old('valor', optional($produto)->valor) }}" required>
                </div>

                <div class="mb-3 col-6">
                    <label for="data"> Data da Compra</label>
                    <input type="date" name="data_compra" id="data_compra" class="form-control" value="{{ old('data_compra', optional($produto)->data_compra ? date('Y-m-d', strtotime($produto->data_compra)) : '') }}" required>
                </div>
            </div>



            <button type="submit" class="btn btn-primary">Salvar Estoque</button>
          
            <a class='btn btn-secondary @if ($produto == null) disabled @endif' href="{{ route('estoque.create') }}">
                Cadastrar Novo Estoque
            </a>
            <a class='btn btn-secondary' href="{{ route('estoque.index') }}">
                Voltar
            </a>
        </form>
        </div>


        @endsection