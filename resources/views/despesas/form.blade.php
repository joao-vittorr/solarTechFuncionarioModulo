@extends('layouts.template') 

@section('content')  

<form action="{{ route('cadastrar_despesa') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="descricao">Descrição da Despesa</label>
        <input type="text" name="descricao" id="descricao" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="valor">Valor</label>
        <input type="number" name="valor" id="valor" class="form-control" step="0.01" required>
    </div>

    <div class="form-group">
        <label for="data">Data da Despesa</label>
        <input type="date" name="data" id="data" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="categoria">Categoria da Despesa</label>
        <select name="categoria" id="categoria" class="form-control" required>
            <option value="alimentacao">Alimentação</option>
            <option value="moradia">Moradia</option>
            <option value="transporte">Transporte</option>
            <option value="educacao">Educação</option>
            <option value="outra">Outra</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar Despesa</button>
</form>






@endsection