@extends('layouts.template')

@section('content')
<br />
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Online Store Visitors</h3>
                            <a href="javascript:void(0);">View Report</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg">820000000</span>
                                <span>Visitors Over Time</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success">
                                    <i class="fas fa-arrow-up"></i> 12.5%
                                </span>
                                <span class="text-muted">Since last week</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->

                        <div class="position-relative mb-4">
                            <canvas id="visitors-chart" height="200"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> This Week
                            </span>

                            <span>
                                <i class="fas fa-square text-gray"></i> Last Week
                            </span>
                        </div>
                    </div>
                </div>
                <!-- /.card -->

                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Products</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Valor</th>
                                    <th>Data de Compra</th>
                                    <th>Quantidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produtosRecentes as $produto)
                                <tr>
                                    <td>
                                        {{ $produto->descricao }}
                                    </td>
                                    <td>${{ $produto->valor }}</td>
                                    <td>{{ $produto->data_compra}}</td>
                                    <td>{{ $produto->quantidade }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">{{__("Sales")}}</h3>
                            <a href="javascript:void(0);">View Report</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg vendas"></span>
                                <span>Número de vendas dos ultimos meses:</span>
                            </p>
                            <!-- <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success">
                                    <i class="fas fa-arrow-up"></i> 33.1%
                                </span>
                                <span class="text-muted">{{__("Since last month")}}</span>
                            </p> -->
                        </div>
                        <!-- Gráfico de vendas -->
                        <div class="position-relative mb-4">
                            <canvas id="sales-chart"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> 2023
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span>Categoria mais vendida:</span>
                            </p>
                        </div>
                        <!-- Gráfico de categorias -->
                        <div class="position-relative mb-4">
                            <canvas id="categorias-chart"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> 2023
                            </span>
                        </div>
                    </div>
                </div>
                <!-- /.card -->

                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Online Store Overview</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-sm btn-tool">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-tool">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                            <p class="text-success text-xl">
                                <i class="ion ion-ios-refresh-empty"></i>
                            </p>
                            <p class="d-flex flex-column text-right">
                                <span class="font-weight-bold">
                                    <i class="ion ion-android-arrow-up text-success"></i> 12%
                                </span>
                                <span class="text-muted">CONVERSION RATE</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->
                        <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                            <p class="text-warning text-xl">
                                <i class="ion ion-ios-cart-outline"></i>
                            </p>
                            <p class="d-flex flex-column text-right">
                                <span class="font-weight-bold">
                                    <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
                                </span>
                                <span class="text-muted">SALES RATE</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->
                        <div class="d-flex justify-content-between align-items-center mb-0">
                            <p class="text-danger text-xl">
                                <i class="ion ion-ios-people-outline"></i>
                            </p>
                            <p class="d-flex flex-column text-right">
                                <span class="font-weight-bold">
                                    <i class="ion ion-android-arrow-down text-danger"></i> 1%
                                </span>
                                <span class="text-muted">REGISTRATION RATE</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<br />

<script>
    // Dados PHP para JavaScript
    var vendasPorMes = <?php echo json_encode($vendasPorMes); ?>;
    var mesesDisponiveis = <?php echo json_encode($mesesDisponiveis); ?>;
    var categoriasMaisVendidas = <?php echo json_encode($categoriasMaisVendidas); ?>;

    // Preencher os meses ausentes com zero
    for (var i = 0; i < mesesDisponiveis.length; i++) {
        if (!vendasPorMes.hasOwnProperty(mesesDisponiveis[i])) {
            vendasPorMes[mesesDisponiveis[i]] = 0;
        }
    }

    // Configuração do gráfico de vendas
    var chartConfigVendas = {
        type: 'bar',
        data: {
            labels: mesesDisponiveis,
            datasets: [{
                label: 'Vendas',
                data: Object.values(vendasPorMes),
                backgroundColor: 'rgba(0, 123, 255, 0.7)',
                barPercentage: 0.1,
                borderWidth: 0.2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            if (value % 1 === 0) {
                                return value;
                            }
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 10,
                    bottom: 10
                }
            },
            scales: {
                x: {
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    }
                },
                y: {
                    display: true,
                    gridLines: {
                        display: false
                    }
                }
            }
        }
    };

    // Configuração do gráfico de categorias
    var chartConfigCategorias = {
        type: 'bar',
        data: {
            labels: categoriasMaisVendidas.map(item => item.categoria),
            datasets: [{
                label: 'Categorias',
                data: categoriasMaisVendidas.map(item => item.total),
                backgroundColor: 'rgba(0, 123, 255, 0.7)',
                barPercentage: 0.1,
                borderWidth: 0.2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            if (value % 1 === 0) {
                                return value;
                            }
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        render: function(args) {
                            var dataset = args.dataset;
                            var total = dataset.data[args.dataIndex];
                            return total + ' vendas';
                        },
                        fontStyle: 'bold',
                    }
                }
            }
        }
    };

    // Espera o documento estar totalmente carregado
    document.addEventListener('DOMContentLoaded', function() {
        // Criar o gráfico de vendas após o carregamento do documento
        var salesChart = new Chart(document.getElementById('sales-chart'), chartConfigVendas);

        // Criar o gráfico de categorias após o carregamento do documento
        var chartCategorias = new Chart(document.getElementById('categorias-chart'), chartConfigCategorias);
    });
</script>

@endsection