@extends('layouts.template') 

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br><br>
    <h1 class="justify-content-center">Usuários do sistema</h1>
    <!-- Main content -->
    <div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <!-- Adicione um formulário de busca pelo CPF acima da tabela -->
            <form method="GET" action="{{ route('gerenciar.funcionario.searchByCPF') }}">
              <input type="text" name="cpf" placeholder="Buscar por CPF">
              <button type="submit">Buscar</button>
            </form>

            <table class="table">
              <!-- Restante da tabela permanece igual -->
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nome</th>
                  <th scope="col">CPF</th>
                  <th scope="col">Nível Atual</th>
                  <th scope="col">Atualizar Nível</th>
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
                    <form method="POST" action="{{ route('gerenciar.funcionario.updateLevel', $user->id) }}">
                      @csrf
                      @method('PUT')
                      <select name="access_level">
                        <option value="normal" {{ $user->access_level === 'normal' ? 'selected' : '' }}>Cliente</option>
                        <option value="funcionario" {{ $user->access_level === 'funcionario' ? 'selected' : '' }}>Funcionário</option>
                        <option value="admin" {{ $user->access_level === 'admin' ? 'selected' : '' }}>Master</option>
                      </select>
                      <button type="submit">Salvar</button>
                    </form>
                  </td>
                  <td>
                    <!-- Adicione outras ações conforme necessário -->
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
 