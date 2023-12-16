@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="mt-4 d-flex justify-content-between align-items-center">
            <h1>Estoque</h1>
            <p>
                <a href="{{ route('estoque.create') }}" class="btn btn-info"><b>+ Estoque</b></a>
            </p>
        </div>
        @forelse ($estoques as $produto)
            <br />
            <div class="row mb-3 text-center border border-2 rounded">
                <div class="pb-1 col-md-6 themed-grid-col">
                    <p><strong>Descrição: </strong>{{ $produto->descricao }}</p>
                    <p><strong>Valor total: </strong>R$ {{ number_format($produto->valor, 2, ',', '.') }}</p>
                </div>
                <div class="col-md-6 themed-grid-col">
                    <div class="row">
                        <div class="p-1 col-md-6 themed-grid-col">
                            <strong>Quantidade: </strong>{{ $produto->quantidade }}
                        </div>
                        <div class="p-1 col-md-6 themed-grid-col">
                            <strong>Data: </strong>{{ date('d/m/Y', strtotime($produto->data_compra)) }}
                        </div>
                        <div class="p-1 col-md-6 themed-grid-col">
                            <a href="{{ route('estoque.edit', $produto->id) }}"
                                class="btn btn-block btn-info w-100">Editar</a>
                        </div>
                        <div class="p-1 col-md-6 themed-grid-col">
                            <form method="POST" action="{{ route('estoque.destroy', ['id' => $produto->id]) }}">
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
                    <p>Nenhum Estoque cadastrado!</p>
            </div>
        </div>
        @endforelse
        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4 pagination">
            {{ $estoques->links('components.pagination') }}
        </div>
    </div>
@endsection
