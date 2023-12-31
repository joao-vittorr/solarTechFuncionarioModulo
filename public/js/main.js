const csrfToken = document.querySelector('input[name="_token"]').value;

const logoutLink = document.getElementById('logout-link');


logoutLink.addEventListener('click', (e) => {
    e.preventDefault();

    if (csrfToken) {
        fetch('/logout', {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
        })
            .then((response) => {
                if (response.ok) {
                    window.location.href = '/';
                    window.location.replace("/");
                } else {
                    console.error('Erro ao fazer logout');
                }
            })
            .catch((error) => {
                console.error('Erro na requisição de logout:', error);
            });
    } else {
        console.error('Token CSRF não encontrado');
    }
});


$('.visualizar-pdf').on('click', function () {
    var faturaID = $(this).data('id');
    var nome = $(this).data('nome');
    var cpf = $(this).data('cpf');
    var logradouro = $(this).data('logradouro');
    var numeroCasa = $(this).data('numero-casa');
    var bairro = $(this).data('bairro');
    var cidade = $(this).data('cidade');
    var estado = $(this).data('estado');
    var email = $(this).data('email');
    var nomePacote = $(this).data('nome-pacote');
    var quantidadePlacas = $(this).data('quantidade-placas');
    var valorFinal = $(this).data('valor-final');
    var dataCompra = $(this).data('compra-data');
    var status = $(this).data('status');

    // Preencher os elementos HTML do modal com os dados
    $('#myModal').html(`
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header justify-content-betwenn">
            <strong>${status}</strong>
            <button type="button" class="close btn btn-danger " data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body row">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-md-offset-3 body-main">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="img-fluid" alt="Logo" src="${window.location.origin}/images/logoProjetoSolarTech.png" />
                                </div>
                                <div class="col-md-8 text-end">
                                    <div>
                                        <h2><b>Fatura </b>#${faturaID}</h2>
                                    </div>
                                    <h4 style="color: #242424;"><strong>${nome}</strong></h4>
                                    <h5 style="color: #242424;"><strong>CPF: ${cpf}</strong></h5>
                                    <p>${logradouro}, ${numeroCasa}</p>
                                    <p>${bairro},
                                        ${cidade}/${estado}
                                    </p>
                                    <p>${email}</p>
                                </div>
                            </div>
                            <br />
                            <br />
                            <div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <h5>Descrição</h5>
                                            </th>
                                            <th>
                                                <h5>Quantidade</h5>
                                            </th>
                                            <th>
                                                <h5>Valor</h5>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-md-6">${nomePacote}</td>
                                            <td class="col-md-3">${quantidadePlacas}</td>
                                            <td class="col-md-3">R$
                                                ${valorFinal}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Resumo: </th>
                                            <td class="text-right">
                                                <p>
                                                    <strong>Subtotal: </strong>
                                                </p>
                                                <p>
                                                    <strong>Valor Total: </strong>
                                                </p>
                                            </td>
                                            <td>
                                                <p>
                                                    <strong>R$ ${valorFinal}</strong>
                                                </p>
                                                <p>
                                                    <strong>R$ ${valorFinal}
                                                    </strong>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr style="color: #272727;">
                                            <td class="text-right">
                                                <h4><strong>Total:</strong></h4>
                                            </td>
                                            <td></td>
                                            <td class="text-left">
                                                <h4><strong> R$
                                                        ${valorFinal}</strong>
                                                </h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <p><b>Data da Compra :</b> ${dataCompra} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <a href="#" id="gerarPdfLink" class="card-link btn btn-primary">Gerar PDF</a>
    </div>
</div>
  `);

    $('#gerarPdfLink').on('click', function () {
        window.location.href = '/fatura/pdf/' + faturaID + '/create';
    });

    $('#myModal').find('.modal-body').load(`pdf.index/${faturaID}`);
});

const TimeSlow = 10000;

$(document).ready(function () {
    // Esconde a mensagem após 5 segundos (5000 milissegundos)
    setTimeout(function () {
        $("#resIdEstoque").fadeOut("slow");
    }, TimeSlow);
});

$(document).ready(function () {
    // Esconde a mensagem após 5 segundos (5000 milissegundos)
    setTimeout(function () {
        $("#resIdDespesa").fadeOut("slow");
    }, TimeSlow);
});

$(document).ready(function () {
    // Esconde a mensagem após 5 segundos (5000 milissegundos)
    setTimeout(function () {
        $("#resIdFatura").fadeOut("slow");
    }, TimeSlow);
});

$(document).ready(function () {
    // Esconde a mensagem após 5 segundos (5000 milissegundos)
    setTimeout(function () {
        $("#resIdVendas").fadeOut("slow");
    }, TimeSlow);
});