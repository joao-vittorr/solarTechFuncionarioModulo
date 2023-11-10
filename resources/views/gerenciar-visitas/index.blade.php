@extends('layouts.template')

@section('content')
<div class="container-fluid">
  <h1>Usuários que solicitaram visita técnica</h1>

  <div class="row row-cols-1 row-cols-md-2 g-4card-group">
    @foreach($usuariosComVisitas as $visita)
    <div class="col">
      <div class="card mt-1">
        <div class="card-body">
          <h5 class="card-title">Nome do Usuário: {{ $visita->user->name }}</h5>
          <h6 class="card-subtitle mb-2 text-body-secondary">CPF: {{ $visita->user->cpf }}</h6>
          <p class="card-text">Detalhes: {{ $visita->detalhes }}</p>
          <p class="card-text">Data Agendada: {{ $visita->data_agendada }}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <!-- Pagination Links -->
  <div class="d-flex justify-content-center mt-4 pagination">
    {{ $usuariosComVisitas->links('components.pagination') }}
  </div>
</div>
@endsection