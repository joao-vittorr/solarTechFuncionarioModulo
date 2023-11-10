@extends('layouts.template')

@section('content')


<div class="container-fluid">
    <h1>{{ __('Expenses') }}</h1>
    <form action="{{ route('despesas.search') }}" method="GET">
        <input type="text" name="categoria" placeholder="Buscar por categoria" value="{{ $categoria ?? '' }}">
        <button type="submit">Buscar</button>
    </form>
    <div class="row row-cols-1 row-cols-md-2 g-4card-group">
        @foreach ($despesas as $despesa)
        <div class="col">
            <div class="card mt-1">
                <div class="card-body">
                    <h5 class="card-title">Despesa: {{ $despesa->descricao }}, Valor: R$ {{ number_format($despesa->valor, 2, ',', '.') }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Data: {{ date('d/m/Y', strtotime($despesa->data_despesa)) }}</h6>
                    <p class="card-text">Categoria: {{ $despesa->categoria->nome }}</p>
                    <div class="btn-group">
                        <a href="{{route("despesas.edit",$despesa)}}" class="btn btn-block btn-info">
                            Editar
                        </a>
                        <form method="POST" action="{{ route('despesas.destroy', ['id' => $despesa->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4 pagination">
        {{ $despesas->links('components.pagination') }}
    </div>
</div>
@endsection