@extends('layouts.template') 

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <br><br>

      <h1>Cadastro de visitas</h1>
      <!-- Main content -->
      <div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">

              <!-- Seu formulário -->
              <form action="{{ route('visitas.store') }}" method="post">
                @csrf

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                <textarea name="detalhes" placeholder="Detalhes da visita técnica"></textarea><br>
                <input type="datetime-local" name="data_agendada"><br>
                <input type="checkbox" name="necessita_visita" value="1"> Necessita de visita técnica<br>
                <button type="submit">Agendar Visita Técnica</button>
              </form>


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