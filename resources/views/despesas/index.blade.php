@extends('layouts.template')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content">
        <br>
        <h1 class="justify-content-center">{{ __('Expenses') }}</h1>
        <!-- Main content -->
        <div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <table id="data-table">
                            <thead>
                                <tr>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($despesas as $despesa)
                                    <tr>
                                        <td>{{ $despesa->descricao }}</td>
                                        <td>R$ {{ number_format($despesa->valor, 2, ',', '.') }}</td>
                                        <td>{{ date('d/m/Y', strtotime($despesa->data)) }}</td>
                                        <td>{{ $despesa->categoria }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route("despesas.edit",$despesa)}}" class="btn btn-block btn-info">
                                                  Editar
                                                </a>
                                                <form method="POST" action="{{ route('despesas.destroy', ['id' => $despesa->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </div>
@endsection
