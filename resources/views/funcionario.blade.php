@extends('layouts.template')

@section('content')
<br><br>
<div>
  <h1>Usuários do sistema</h1>
  <!-- Adicione um formulário de busca pelo CPF acima da tabela -->
  <form method="GET" action="{{ route('gerenciar.funcionario.searchByCPF') }}" class="mb-3">
    <div class="input-group">
      <input type="text" name="cpf" placeholder="Buscar por CPF" class="form-control">
      <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
  </form>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>CPF</th>
          <th>Nível Atual</th>
          <th>Atualizar Nível</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->cpf }}</td>
          <td>{{ $user->access_level }}</td>
          <td>
            <form id="form-{{ $user->id }}" method="POST" action="{{ route('gerenciar.funcionario.updateLevel', $user->id) }}">
              @csrf
              @method('PUT')
              <div class="input-group">
                <select name="access_level" class="form-select access-level" onchange="document.getElementById('form-{{ $user->id }}').submit()">
                  <option value="normal" {{ $user->access_level === 'normal' ? 'selected' : '' }}>Cliente</option>
                  <option value="funcionario" {{ $user->access_level === 'funcionario' ? 'selected' : '' }}>Funcionário</option>
                  <option value="admin" {{ $user->access_level === 'admin' ? 'selected' : '' }}>Master</option>
                </select>
              </div>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
