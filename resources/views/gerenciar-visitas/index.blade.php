@extends('layouts.template') 

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <br><br>

      <h1>Usuários que solicitaram visita técnica</h1>
      <!-- Main content -->
      <div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">


              <ul>
                @foreach($usuariosComVisitas as $visita)
                <p>Detalhes: {{ $visita->detalhes }}</p>
                <p>Data Agendada: {{ $visita->data_agendada }}</p>
                <p>Usuário: {{ $visita->user->name }}</p> <!-- Acessando o nome do usuário via a relação -->
                <!-- Outros detalhes que deseja exibir -->
                @endforeach
              </ul>

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