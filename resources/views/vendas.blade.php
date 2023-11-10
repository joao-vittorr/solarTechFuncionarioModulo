@extends('layouts.template')

@section('content')
<div class="container-fluid">
  <h1>Produtos vendidos</h1>
  <form action="{{ route('venda.mostrar') }}" method="GET">
    <input type="text" name="tipoPacote" placeholder="Tipo de Pacote" value="{{ $tipoPacote ?? '' }}">
    <input type="text" name="cpfUsuario" placeholder="CPF do Usuário" value="{{ $cpfUsuario ?? '' }}">
    <button type="submit">Buscar</button>
  </form>
  <div class="row row-cols-1 row-cols-md-2 g-4card-group">
    @foreach($dadosVendas as $venda)
    <div class="col">
      <div class="card mt-1">
        <div class="card-body">
          <h5 class="card-title">Nome do Usuário: {{ $venda->user->name }}</h5>
          <p>CPF: {{ $venda->user->cpf }}</p>
          <h6 class="card-subtitle mb-2 text-body-secondary">Pacote escolhido: {{ $venda->nomePacote }}</h6>
          <p class="card-text">Quantidade de placas: {{ $venda->quantidadePlacas }} - Valor total: R$ {{ $venda->valorFinal }}</p>
          <a href="#" class="card-link">
            <form method="POST" action="{{ route('venda.deletar', ['id' => $venda->id]) }}">
              @csrf
              @method('DELETE')
              <button type="submit">Deletar</button>
            </form>
          </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <!-- Pagination Links -->
  <div class="d-flex justify-content-center mt-4 pagination">
    {{ $dadosVendas->links('components.pagination') }}
  </div>
</div>
<!-- /.content -->
@endsection