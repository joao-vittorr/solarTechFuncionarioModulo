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
                    <div class="mb-3 col-12">
                        <label for="descricao" class="form-label">Descrição da Despesa</label>
                        <textarea class="form-control" name="descricao" id="descricao" required rows="3">{{ old('descricao', optional($despesa)->descricao) }}</textarea>
                    </div>


                    <div class="mb-3 col-12">
                        <label for="categoria">Categoria da Despesa</label>
                        <select name="categoria" id="categoria" class="form-control" required>
                            <option value="" selected>Selecione uma opção</option>
                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria['id'] }}" {{ optional($despesa)->categoria_id === $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nome }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-6">
                        <label for="valor">Valor</label>
                        <input type="number" name="valor" id="valor" class="form-control" step="0.01" value="{{ old('valor', optional($despesa)->valor) }}" required>
                    </div>

                    <div class="mb-3 col-6">
                        <label for="data"> Data da Despesa</label>
                        <input type="date" name="data_despesa" id="data_despesa" class="form-control" value="{{ old('data_despesa', optional($despesa)->data_despesa) }}" required>
                    </div>
                </div>


                <!-- @if ($despesa && $despesa->id) -->
            </form>
            <!-- <form method="POST" action="{{ route('despesas.destroy', ['id' => $despesa->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
            @endif-->
            <a href="{{ route('categorias.create') }}" class="btn btn-primary">Criar Nova Categoria</a>
            <button type="submit" class="btn btn-primary">Salvar Despesa</button>

            <a class='btn btn-secondary' href="{{ route('despesas.create') }}">
                Cadastrar Nova Despesa
            </a>
            <a class='btn btn-secondary' href="{{ route('despesas.index') }}">
                Voltar
            </a>
            @endsection
        </div>