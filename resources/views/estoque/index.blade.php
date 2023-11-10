@extends('layouts.template')

@section('content')
<div class="container-fluid">
  <h1>Estoque</h1>
  <a href="{{route('estoque.create')}}" class="btn btn-block btn-info">
    Criar Novo Estoque
  </a>
  <div class="row row-cols-1 row-cols-md-2 g-4card-group">
    @foreach($estoques as $produto)
    <div class="col">
      <div class="card mt-1">
        <div class="card-body">
          <h5 class="card-title">Descrição: {{ $produto->descricao }}</h5>
          <h6>Quantidade: {{ $produto->quantidade }}, {{ date('d/m/Y', strtotime($produto->data_compra)) }}</h6>
          <p class="card-text">Valor total: R$ {{ number_format($produto->valor, 2, ',', '.') }}</p>
          <div class="btn-group">
            <a href="{{route("estoque.edit", $produto->id)}}" class="btn btn-block btn-info">
              Editar
            </a>
            <form method="POST" action="{{ route('estoque.destroy', ['id' => $produto->id]) }}">
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
    {{ $estoques->links('components.pagination') }}
  </div>
</div>
@endsection