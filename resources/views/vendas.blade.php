@extends('layouts.template') 

@section('content')
    <div class="content-wrapper">
      <br><br>
      <h1 class="justify-content-center">Produtos vendidos</h1>
      <!-- Main content -->
      <div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <table id="data-table">
                <thead>
                  <tr>
                    <th scope="col">Usuário</th>
                    <th scope="col">Pacote</th>
                    <th scope="col">Qtd de Placas</th>
                    <th scope="col">Valor Final</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($dadosVendas as $venda)
                  <tr>
                    <td>{{ $venda->user->name }}</td>
                    <td>{{ $venda->nomePacote }}</td>
                    <td>{{ $venda->quantidadePlacas }}</td>
                    <td>R$ {{ $venda->valorFinal }}</td>
                    <td>
                      <form method="POST" action="{{ route('venda.deletar', ['id' => $venda->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Deletar</button>
                      </form>
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