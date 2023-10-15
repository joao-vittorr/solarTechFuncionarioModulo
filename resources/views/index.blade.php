<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="#">Página Inicial</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Contato</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
    </nav>
    <h1>Bem-vindo à nossa página inicial</h1>
</body>
</html>