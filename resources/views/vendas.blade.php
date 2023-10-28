<!DOCTYPE html>
<html>
<head>
    <title>Vendas</title>
</head>
<body>
    <h1>Lista de Vendas</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <!-- Adicione outras colunas aqui conforme necessário -->
            </tr>
        </thead>
        <tbody>
            @foreach ($vendas as $venda)
            <tr>
                <td>{{ $venda->id }}</td>
                <td>{{ $venda->name }}</td>
                <td>{{ $venda->email }}</td>
                <!-- Adicione outras células conforme necessário -->
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
