@extends('layouts.template')

@section('content')
<div class="container">

    <div class="mt-4 d-flex justify-content-between align-items-center">
        <h1>Faturas Existentes</h1>
        <div class="mb-4">
            <a href="{{ route('fatura.index', ['filtro' => 'todas']) }}" class="btn btn-primary">Todas as Faturas</a>
            <a href="{{ route('fatura.index', ['filtro' => 'pagas']) }}" class="btn btn-success">Faturas Pagas</a>
            <a href="{{ route('fatura.index', ['filtro' => 'nao_pagas']) }}" class="btn btn-danger">Faturas Não Pagas</a>
        </div>
    </div>
    <p>
    <form method="GET" action="{{ route('fatura.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4 mb-3">

                <input type="text" name="search_id" class="form-control" value="{{ request('search_id', '') }}" placeholder="Pesquisar por ID da Fatura:">
            </div>
            <div class="col-md-4 mb-3">
                <input type="text" name="search_cpf" class="form-control" value="{{ request('search_cpf', '') }}" placeholder="Pesquisar por CPF do Cliente:">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </div>
    </form>
    </p>

    @forelse ($dadosFaturas as $fatura)
    <br />
    <div class="row mb-3 text-center border border-2 rounded">
        <div class="pb-1 col-md-6 themed-grid-col">
            <div class="row">
                <p class="p-1 col-md-4 themed-grid-col"><strong>Fatura ID: </strong>{{ $fatura->id }}</p>
                <p class="p-1 col-md-8 themed-grid-col"><strong>Nome do Cliente: </strong>{{ $fatura->venda->user->name }}</p>
                <p class="p-1 col-md-6 themed-grid-col"><strong>CPF do Cliente: </strong>{{ $fatura->venda->user->cpf }}</p>
                <p class="p-1 col-md-6 themed-grid-col"><strong>Valor: </strong>R$ {{ number_format($fatura->valor, 2, ',', '.') }}</p>
            </div>
        </div>
        <div class="col-md-6 themed-grid-col">
            <div class="row">
                <div class="p-1 col-md-6 themed-grid-col">
                    <strong>Status de Pagamento: </strong>{{ $fatura->pago ? 'Pago' : 'Não Pago' }}
                </div>
                <div class="p-1 col-md-6 themed-grid-col">
                    <strong>Data de Criação: </strong>{{ date('d/m/Y', strtotime($fatura->created_at)) }}
                </div>
                <div class="p-1 col-md-12 themed-grid-col">
                    <!-- Formulário para atualizar o pagamento -->
                    <form method="POST" action="{{ route('atualizar-pagamento', ['id' => $fatura->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="pago">Marcar como Pago:</label>
                            <select name="pago" class="form-control">
                                <option value="1" {{ $fatura->pago ? 'selected' : '' }}>Sim</option>
                                <option value="0" {{ $fatura->pago ? '' : 'selected' }}>Não</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Atualizar Pagamento</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <p>Nenhuma fatura encontrada.</p>
    @endforelse

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4 pagination">
        {{ $dadosFaturas->links('components.pagination') }}
    </div>
</div>
@endsection

