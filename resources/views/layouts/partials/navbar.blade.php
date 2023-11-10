<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('dashboard') }}"><img src="{{ asset('images/logoProjetoSolarTech.svg') }}" alt="Logo Projeto SolarTech" style="height: 40px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><a class="navbar-brand" href="{{ route('dashboard') }}"><img src="{{ asset('images/logoProjetoSolarTech.svg') }}" alt="Logo Projeto SolarTech" style="width: 40px;"></a></h5>
        <span>Olá, {{ auth()->user()->name }}!</span>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Gerenciar Funcionário
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="{{ route('gerenciar.funcionario') }}">Tabela de Funcionários</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Financeiro
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="{{ route('despesas.index') }}">Gerenciar Despesas</a></li>
              <li><a class="dropdown-item" href="{{ route('')}}">Gerenciar Estoque</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="pages/forms/editors.html">Editors</a></li>
              <li><a class="dropdown-item" href="pages/forms/validation.html">Validation</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Controle de Vendas
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="{{ route('venda.mostrar') }}">Produtos vendidos</a></li>
              <li><a class="dropdown-item" href="{{ route('index') }}">Visitas Técnicas</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            Aplicação em tela Cheia
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" role="button" id="logout-link">
            Realizar logout
            @csrf
            <i class="fa-solid fa-right-from-bracket logout"></i>
          </a>
        </li>
        </ul>
        <!-- <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form> -->
      </div>
    </div>
  </div>
</nav>