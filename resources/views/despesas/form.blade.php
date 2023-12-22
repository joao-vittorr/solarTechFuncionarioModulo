@extends('layouts.template')

@section('content')
@if ($despesa && $despesa->id)
<div class="container">
    <h1>Editar Despesa</h1>
    <form id="main" method="POST" action="{{ route('despesas.update', ['id' => $despesa->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @else
        <div class="container">
            <h1>Criar Nova Despesa</h1>
            <form id="main" method="POST" action="{{ route('despesas.store') }}" enctype="multipart/form-data">
                @endif
                <div class="row">
                    @csrf
                    <div class=" col-12 mb-4">
                        <label for="descricao" class="form-label">Descrição da Despesa</label>
                        <textarea class="form-control" name="descricao" id="descricao" required rows="3">{{ old('descricao', optional($despesa)->descricao) }}</textarea>
                    </div>

                    <div class="col-6 mb-2">
                        <label for="categoria" class="mr-3">Categoria da Despesa</label>
                        <select name="categoria" id="categoria" class="form-control" required>
                            <option value="" selected>Selecione uma opção: </option>
                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria['id'] }}" {{ optional($despesa)->categoria_id === $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nome }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3 col-6">
                        <label for="valor">Valor:</label>
                        <input type="number" name="valor" id="valor" class="form-control" step="0.01" value="{{ old('valor', optional($despesa)->valor) }}" required>
                    </div>

                    <div class="mb-4 col-6">
                        <label for="data"> Data da Despesa:</label>
                        <input type="date" name="data_despesa" id="data_despesa" class="form-control" value="{{ old('data_despesa', optional($despesa)->data_despesa ? date('Y-m-d', strtotime($despesa->data_despesa)) : '') }}" required>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary" id="salvarDespesa">Salvar Despesa</button>
                <a href="{{ route('categorias.create') }}" class="btn btn-primary">
                    <b>+ Categoria</b>
                </a>
                <a class='btn btn-secondary @if ($despesa == null) disabled @endif' href="{{ route('despesas.create') }}">
                    Cadastrar Nova Despesa
                </a>
                <a class='btn btn-secondary' href="{{ route('despesas.index') }}">
                    Voltar
                </a>
            </form>
            @endsection
        </div>