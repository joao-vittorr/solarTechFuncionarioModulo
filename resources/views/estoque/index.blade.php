@extends('layouts.template')

@section('content')
<h1>Estoque</h1>
<a href="{{route('estoque.create')}}" class="btn btn-block btn-info">
  Criar Novo Estoque
</a>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Quantidade</th>
        <th>Valor</th>
        <th>Data da Compra</th>
        <th>Descrição</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($estoques as $produto)
      <tr>
        <td>{{ $produto->quantidade }}</td>
        <td>R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
        <td>{{ date('d/m/Y', strtotime($produto->data_compra)) }}</td>
        <td>{{ $produto->descricao }}</td>
        <td>
          <div class="btn-group">
            <a href="{{route("estoque.edit", $produto->id)}}" class="btn btn-block btn-info">
              Editar
            </a>
            <form method="POST" action="{{ route('estoque.destroy', ['id' => $produto->id]) }}">
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

  @endsection