@extends('layouts.template')

@section('content')
<div class="container">
  <h1 class="mt-4">Produtos vendidos</h1>
  <p>
  <form action="{{ route('venda.mostrar') }}" method="GET">
    <input type="text" name="tipoPacote" placeholder="Tipo de Pacote" value="{{ $tipoPacote ?? '' }}">
    <input type="text" name="cpfUsuario" placeholder="CPF do Usuário" value="{{ $cpfUsuario ?? '' }}">
    <button type="submit">Buscar</button>
  </form>
  </p>
  @foreach($dadosVendas as $venda)
  <br />
  <div class="row mb-3 text-center border border-2 rounded">
    <div class="pb-1 col-md-6 themed-grid-col">
      <p><strong>Nome do Usuário: </strong>{{ $venda->user->name }}</p>
      <p><strong>CPF: </strong>{{ $venda->user->cpf }}</p>
    </div>
    <div class="col-md-6 themed-grid-col">
      <div class="row">
        <div class="p-1 col-md-6 themed-grid-col">
          <strong>Pacote escolhido: </strong>{{ $venda->nomePacote }}
        </div>
        <div class="p-1 col-md-6 themed-grid-col">
          <strong>Quantidade de placas: </strong>{{ $venda->quantidadePlacas }} - Valor total: R$ {{ $venda->valorFinal }}
        </div>
        <div class="p-1 col-md-6 themed-grid-col">
          <a href="#" class="card-link">
            <form method="GET" action="{{ route('pdf.index', ['id' => $venda->id]) }}">
              @csrf
              <button type="submit">Visualizar PDF</button>
            </form>
          </a>
        </div>
        <div class="p-1 col-md-6 themed-grid-col">
          <form method="POST" action="{{ route('venda.deletar', ['id' => $venda->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-100">Deletar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <!-- Pagination Links -->
  <div class="d-flex justify-content-center mt-4 pagination">
    {{ $dadosVendas->links('components.pagination') }}
  </div>
</div>
<!-- /.content -->
@endsection