@extends('layouts.template')

@section('content')


<br><br>
<!-- Main content -->
<div class="container-fluid">
  <h1>Usuários do sistema</h1>
  <form method="GET" action="{{ route('gerenciar.funcionario.searchByCPF') }}" class="mb-3">
    <div class="input-group">
      <input type="text" name="cpf" placeholder="Buscar por CPF" class="form-control">
      <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
  </form>
  <div class="row row-cols-1 row-cols-md-2 g-4card-group">
    @foreach($users as $user)
    <div class="col">
      <div class="card mt-1">
        <div class="card-body">
          <h5 class="card-title">Nome do Usuário: {{ $user->name }}</h5>
          <p>CPF: {{ $user->cpf }}</p>
          <h6 class="card-subtitle mb-2 text-body-secondary">Nível de acesso atual: {{ $user->access_level }}</h6>
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
    @endforeach
  </div>
  <!-- Pagination Links -->
  <div class="d-flex justify-content-center mt-4 pagination">
    {{ $users->links('components.pagination') }}
  </div>
</div>
@endsection