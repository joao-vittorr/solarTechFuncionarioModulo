@extends('layouts.template')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
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
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                    <th>Data</th>
                                    <th>Categoria</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($despesas as $despesa)
                                    <tr>
                                        <td>{{ $despesa->descricao }}</td>
                                        <td>R$ {{ number_format($despesa->valor, 2, ',', '.') }}</td>
                                        <td>{{ date('d/m/Y', strtotime($despesa->data)) }}</td>
                                        <td>{{ $despesa->categoria }}</td>
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
