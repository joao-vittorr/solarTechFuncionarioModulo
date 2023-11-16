@extends('layouts.template')

@section('content')
<div class="container">
  <h1 class="mt-4">Usuários que solicitaram visita técnica</h1>
  <p>Realize o gerenciamento de visitas técnicas.</p>

  @foreach($usuariosComVisitas as $visita)
  <div class="row mb-3 text-center border border-2 rounded">
    <div class="col-md-6 themed-grid-col">
      <div class="pb-3">
      <strong>Nome do Usuário: </strong>{{ $visita->user->name }}
      </div>
      <div class="row">
        <div class="col-md-6 themed-grid-col border-top border-2"><strong>CPF: </strong>{{ $visita->user->cpf }}</div>
        <div class="col-md-6 themed-grid-col border-top border-start border-2"><strong>Data Agendada: </strong>{{ $visita->data_agendada }}</div>
      </div>
    </div>
    <div class="col-md-6 themed-grid-col border-start border-2"><strong>Detalhes: </strong>{{ $visita->detalhes }}</div>
  </div>
  @endforeach
  <!-- Pagination Links -->
  <div class="d-flex justify-content-center mt-4 pagination">
    {{ $usuariosComVisitas->links('components.pagination') }}
  </div>
</div>



@endsection