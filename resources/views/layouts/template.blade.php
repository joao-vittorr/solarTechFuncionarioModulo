<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SolarTech</title>
    <link rel="icon" href="{{ asset('images/logoProjetoSolarTechSemTexto.svg') }}" sizes="any" type="image/svg+xml">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('css/dataTable.css') }}">
</head>

<body class="conf-body">
    <header>
        <!-- Navbar -->
        @include('layouts.partials.navbar') <!-- Adicione a sua barra de navegação aqui -->
    </header>
    <br><br><br>
    <main class="wrapper">
        <div class="content-wrapper">

            @yield('content') <!-- Conteúdo dinâmico será inserido aqui -->

        </div>
    </main>

    <footer>
        <!-- Footer -->
        @include('layouts.partials.footer') <!-- Adicione o rodapé aqui -->
    </footer>

    <!-- REQUIRED SCRIPTS -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('js/dataTable.js') }}"></script>
    <script>
        let table = new DataTable('#data-table', {
            language: {
                url: "{{ asset('lang/pt-br.json') }}",
            },
        });
    </script>

    <script src="{{ asset('js/adminlte.js') }}"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('js/Chart.min.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('js/demo.js') }}"></script>
    {{-- Font icons --}}
    <script src="{{ asset('js/iconFontAwesome.js') }}"></script>
    <script src="{{ asset('js/ControlSidebar.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('js/dashboard3.js') }}"></script>
</body>

</html>