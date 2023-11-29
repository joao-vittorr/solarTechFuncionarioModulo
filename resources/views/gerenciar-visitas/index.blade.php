@extends('layouts.template')

@section('content')

<div class="container">

  <div class="mt-4 align-items-center">
    <h1 class="mt-4">Usuários que solicitaram visita técnica</h1>
    <p>Realize o gerenciamento de visitas técnicas.</p>
  </div>

  @foreach($usuariosComVisitas as $visita)
  <br />
  <div class="row mb-3 text-center border border-2 rounded">
    <div class="pb-1 col-md-6 themed-grid-col">
      <p><strong>Detalhes: </strong>{{ $visita->detalhes }}</p>
    </div>
    <div class="col-md-6 themed-grid-col">
      <div class="row">
        <div class="p-1 col-md-12 themed-grid-col">
          <strong>Nome do Usuário: </strong>{{ $visita->user->name }}
        </div>
        <div class="p-1 col-md-6 themed-grid-col">
          <strong>CPF: </strong>{{ $visita->user->cpf }}
        </div>
        <div class="p-1 col-md-6 themed-grid-col">
          <strong>Data Agendada: </strong>{{ $visita->data_agendada }}
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <!-- Pagination Links -->
  <div class="d-flex justify-content-center mt-4 pagination">
    {{ $usuariosComVisitas->links('components.pagination') }}
  </div>
</div>
@endsection