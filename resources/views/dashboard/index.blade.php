@extends('layouts.template')

@section('content')
    <br />
    <div class="container-fluid">
        <div class="justify-content-between align-items-center">
            <div class="row">
                <div class="col-lg-6 mb-2">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Gráfico de venda por meses</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p class="d-flex flex-column">
                                    <span>Colunas com as vendas dos últimos meses</span>
                                </p>
                                <p class="ml-auto d-flex flex-column text-right">
                                    <span class="text-bold text-lg">R$ {{ number_format($totalVendas, 2, ',', '.') }}</span>
                                </p>
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
                    </div>
                </div>

                <div class="col-lg-6 mb-2">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Categorias mais vendidas</h3>
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
                </div>

                <div class="col-lg-6 mb-2">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Estoque recentemente cadastrado</h3>
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
                                    @foreach ($produtosRecentes as $produto)
                                        <tr>
                                            <td>
                                                {{ $produto->descricao }}
                                            </td>
                                            <td>R${{ number_format($produto->valor, 2, ',', '.') }}</td>
                                            <td>{{ date('d/m/Y', strtotime($produto->data_compra)) }}</td>
                                            <td>{{ $produto->quantidade }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br />
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Placas Solares disponíveis</h3>
                        </div>
                        <div class="card-body">
                            <div class="position-relative mb-4">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar"
                                        style="width: {{ ($quantidadeTotalPlacas / $totalEstoque) * 100 }}%;"
                                        aria-valuenow="{{ ($quantidadeTotalPlacas / $totalEstoque) * 100 }}" aria-valuemin="0"
                                        aria-valuemax="100">{{ ($quantidadeTotalPlacas / $totalEstoque) * 100 }}%</div>
                                </div>
                            </div>
                            <div class="position-relative mb-4">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Quantidade Total:</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $quantidadeTotalPlacas }}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Quantidade Vendida:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $totalEstoque - $quantidadeTotalPlacas }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-2">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Vendas, Despesas e Lucro</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span>Vendas, Despesas e Lucro acumulado:</span>
                                </p>
                            </div>
                            <!-- Gráfico de vendas, despesas e lucro -->
                            <div class="position-relative mb-4">
                                <canvas id="lucro-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />

    <script>
        // Dados PHP para JavaScript
        var vendasPorMes = <?php echo json_encode($vendasPorMes); ?>;
        var mesesDisponiveis = <?php echo json_encode($mesesDisponiveis); ?>;
        var categoriasMaisVendidas = <?php echo json_encode($categoriasMaisVendidas); ?>;
        var totalVendas = <?php echo json_encode($totalVendas); ?>;
        var totalDespesas = <?php echo json_encode($totalDespesas); ?>;
        var lucro = <?php echo json_encode($lucro); ?>;


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
                    backgroundColor: ['rgba(0, 123, 255, 0.7)', 'rgba(255, 0, 0, 0.7)', 'rgba(0, 255, 0, 0.7)',
                        'rgba(0, 0, 255, 0.7)'
                    ],
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

        // Configuração do gráfico de vendas, despesas e lucro
        var chartConfigLucro = {
            type: 'bar',
            data: {
                labels: ['Vendas', 'Despesas', 'Lucro'],
                datasets: [{
                    label: 'Valores',
                    data: [totalVendas, totalDespesas, lucro],
                    backgroundColor: ['rgba(0, 123, 255, 0.7)', 'rgba(255, 0, 0, 0.7)', 'rgba(0, 255, 0, 0.7)'],
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

        // Espera o documento estar totalmente carregado
        document.addEventListener('DOMContentLoaded', function() {
            // Criar o gráfico de vendas após o carregamento do documento
            var salesChart = new Chart(document.getElementById('sales-chart'), chartConfigVendas);
            // Criar o gráfico de categorias após o carregamento do documento
            var chartCategorias = new Chart(document.getElementById('categorias-chart'), chartConfigCategorias);
            // Criar o gráfico de vendas, despesas e lucro após o carregamento do documento
            var lucroChart = new Chart(document.getElementById('lucro-chart'), chartConfigLucro);
        });
    </script>
@endsection
