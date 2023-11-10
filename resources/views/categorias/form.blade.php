@extends('layouts.template')

@section('content')
@if (Route::currentRouteName() === 'categorias.edit')
<h1>Editar Categoria</h1>
@else
<h1>Criar Nova Categoria</h1>
@endif


@if ($categoria && $categoria->id)
<form id="main" method="POST" action="{{ route('categorias.update', ['id' => $categoria->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @else
    <form id="main" method="POST" action="{{ route('categorias.store') }}" enctype="multipart/form-data">

        @endif

        @csrf

        <div class="form-group">
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
    </form>

    @if (Route::currentRouteName() === 'categorias.edit')
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar para a Lista de Categorias</a>
    @else
    <a href="{{ route('despesas.index') }}" class="btn btn-secondary">Voltar para a Página de Despesas</a>
    @endif
    @endsection