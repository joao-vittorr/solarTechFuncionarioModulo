@extends('layouts.template')

@section('content')
    @if (Route::currentRouteName() === 'categorias.edit')
        <div class="container">
        <h1>Editar Categoria</h1>
    @else
        <div class="container">
        <h1>Criar Nova Categoria</h1>
    @endif
    @if ($categoria && $categoria->id)
        <div class="row">
        <form id="main" method="POST" action="{{ route('categorias.update', ['id' => $categoria->id]) }}" enctype="multipart/form-data">
        @method('PUT')
    @else
        <div class="row">
        <form id="main" method="POST" action="{{ route('categorias.store') }}" enctype="multipart/form-data">
    @endif
        @csrf
            <div class="mb-3 col-12">
                <label for="name">Nome da Categoria</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ optional($categoria) ? $categoria->nome : '' }}" required>
            </div>
            <button type="submit" class="btn btn-primary">
                @if(Route::currentRouteName() === 'categorias.edit')
                    Atualizar Categoria
                @else
                    Criar Categoria
                @endif
            </button>
            @if (Route::currentRouteName() === 'categorias.edit')
                <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar para a Lista de Categorias</a>
            @else
                <a href="{{ route('despesas.index') }}" class="btn btn-secondary">Voltar para a Página de Despesas</a>
            @endif
        </form>
        </div>
    </div>
@endsection