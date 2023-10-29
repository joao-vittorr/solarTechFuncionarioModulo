<!DOCTYPE html>
<html>
<head>
    <title>Dados da Tabela</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Dados da Tabela</h1>

    <table>
        <thead>
            <tr>
                <th>Nome do Usuário</th>
                <th>Email</th>
                <th>Endereço</th>
                <th>Nome do Pacote</th>
                <th>Quantidade de Placas</th>
                <th>Valor Final</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dadosVendas as $venda)
            <tr>
                <td>{{ $venda->user->name }}</td>
                <td>{{ $venda->user->email }}</td>
                <td>{{ $venda->user->address }}</td>
                <td>{{ $venda->nomePacote }}</td>
                <td>{{ $venda->quantidadePlaca }}</td>
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
</body>
</html>
