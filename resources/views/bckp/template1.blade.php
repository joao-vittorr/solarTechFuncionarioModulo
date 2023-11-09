<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SolarTech</title>
    <link rel="icon" href="{{ asset('images/logoProjetoSolarTechSemTexto.svg') }}" sizes="any" type="image/svg+xml">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('scss/_sidebar-mini.scss') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('css/dataTable.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.partials.navbar') <!-- Adicione a sua barra de navegação aqui -->
        <!-- Main Sidebar Container -->
        @include('layouts.partials.sidebar') <!-- Adicione a sua barra lateral aqui -->
        <!-- Content Wrapper. Contains page content -->
        @include('layouts.partials.control-sidebar')
        <div class="content-wrapper">
           
            @yield('content') <!-- Conteúdo dinâmico será inserido aqui -->
           
        </div>
        <!-- Main Footer -->
        @include('layouts.partials.footer') <!-- Adicione o rodapé aqui -->
    </div>
    <!-- REQUIRED SCRIPTS -->
    
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->

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
