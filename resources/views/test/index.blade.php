<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="{{ asset('images/logoProjetoSolarTechSemTexto.svg') }}" sizes="any" type="image/svg+xml">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Css customizado -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body>
    <div class="container">
        <div>
            <div class="mt-4 d-flex justify-content-between">
                <h1>{{ __('Expenses') }}</h1>
                <p>
                <a href="{{ route('despesas.create') }}" id="criarDespesa" class="btn btn-info">
                        <b> + Despesas </b>
                    </a>
                </p>
            </div>
            @if(session('success'))
            <div id="resIdDespesa" class="bg-warning p-4">
                {{ session('success') }}
            </div>
            @endif
            <br/>
        </div>
        <div>
            <form method="GET" action="{{ route('despesas.index') }}">
                <div class="input-group">
                    <select name="categoria" class="form-control">
                        <option value="" selected>Selecione uma opção</option>
                        @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $categoria->id == $categoriaSelecionada ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    
        @forelse($despesas as $despesa)
        <br />
        <div class="row mb-3 text-center border border-2 rounded">
            <div class="pb-1 col-md-6 themed-grid-col">
                <p id="desc_despesa"><strong>Descrição: </strong>{{ $despesa->descricao }}</p>
                <p><strong>Valor: </strong>R$ {{ number_format($despesa->valor, 2, ',', '.') }}</p>
            </div>
            <div class="col-md-6 themed-grid-col">
                <div class="row">
                    <div class="p-1 col-md-6 themed-grid-col">
                        <strong>Categoria: </strong>{{ $despesa->categoria->nome }}
                    </div>
                    <div class="p-1 col-md-6 themed-grid-col">
                        <strong>Data: </strong>{{ date('d/m/Y', strtotime($despesa->data_despesa)) }}
                    </div>
                    <div class="p-1 col-md-6 themed-grid-col">
                        <a href="{{ route('despesas.edit', $despesa) }}" class="btn btn-block btn-info w-100">Editar</a>
                    </div>
                    <div class="p-1 col-md-6 themed-grid-col">
                        <form method="POST" action="{{ route('despesas.destroy', ['id' => $despesa->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">Deletar</button>
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="text-center">
                    <p>Nenhuma Despesa cadastrada!</p>
            </div>
        </div>
        @endforelse
        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4 pagination">
            {{ $despesas->links('components.pagination') }}
        </div>
    </div>

    
    <!-- REQUIRED SCRIPTS -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/adminlte.js') }}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('js/demo.js') }}"></script>
    {{-- Font icons --}}
    <script src="{{ asset('js/iconFontAwesome.js') }}"></script>
    <script src="{{ asset('js/ControlSidebar.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body> 
</html>
