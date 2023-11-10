@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1>Lista de Categorias</h1>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->nome }}</td>
                <td>
                    <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-block btn-info">
                        Editar
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('categorias.create') }}" class="btn btn-secondary">Cadastrar uma Nova Categoria</a>
    <a href="{{ route('despesas.index') }}" class="btn btn-secondary">Voltar para a Página de Despesas</a>
</div>
@endsection