@extends('layouts.template')

@section('content')

<div class="container">
  <h1 class="mt-4">Usuários do sistema</h1>
  <p>
  <form method="GET" action="{{ route('gerenciar.funcionario.searchByCPF') }}" class="mb-3">
    <div class="input-group">
      <input type="text" name="cpf" placeholder="Buscar por CPF" class="form-control">
      <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
  </form>
  </p>
  @foreach($users as $user)
  <br />
  <div class="row mb-3 text-center border border-2 rounded">
    <div class="pb-1 col-md-6 themed-grid-col">
      <p><strong>Nome do Usuário: </strong>{{ $user->name }}</p>
      <p><strong>CPF: </strong>{{ $user->cpf }}</p>
    </div>
    <div class="col-md-6 themed-grid-col">
      <div class="row">
        <div class="p-1 col-md-6 themed-grid-col">
          <strong>Nível de acesso atual: </strong>{{ $user->access_level }}
        </div>
        <div class="p-1 col-md-6 themed-grid-col">
          <strong>Selecione o novo nível de acesso: </strong>
          <form id="form-{{ $user->id }}" method="POST" action="{{ route('gerenciar.funcionario.updateLevel', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="input-group">
              <select name="access_level" class="form-select access-level" onchange="document.getElementById('form-{{ $user->id }}').submit()">
                <option value="normal" {{ $user->access_level === 'normal' ? 'selected' : '' }}>Cliente</option>
                <option value="funcionario" {{ $user->access_level === 'funcionario' ? 'selected' : '' }}>Funcionário</option>
                <option value="admin" {{ $user->access_level === 'admin' ? 'selected' : '' }}>Admin</option>
              </select>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <!-- Pagination Links -->
  <div class="d-flex justify-content-center mt-4 pagination">
    {{ $users->links('components.pagination') }}
  </div>
</div>
@endsection