$(document).ready(function () {

  $.get("/total-vendas", function (data) {

    var totalVendas = data.totalVendas;

    $(".vendas").text("Valor total das vendas: R$ " + totalVendas);
  });
});


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
  var vendaId = $(this).data('id');
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
  var dataCompra = $(this).data('compra-data')

  // Preencher os elementos HTML do modal com os dados
  $('#myModal').find('.modal-body').html(`
  <div class="modal-body">
  <div class="container">
  <div class="row">
      <div class="col-md-6 col-md-offset-3 body-main">
          <div class="col-md-12">
              <div class="row">
                  <div class="col-md-4">
                    <img class="img-fluid" alt="Logo" src="${window.location.origin}/images/logoProjetoSolarTech.png" />
                  </div>
                  <div class="col-md-8 text-right">
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
              <div class="row">
                  <div class="col-md-12 text-center">
                      <h2>Fatura</h2>
                      <h5>#${vendaId}</h5>
                  </div>
              </div>
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
                              <td class="col-md-9">${nomePacote}</td>
                              <td class="col-md-3">${quantidadePlacas}</td>
                              <td class="col-md-3">R$
                                  ${valorFinal}
                              </td>
                          </tr>
                          <tr>
                              <td class="text-right">
                                  <p>
                                      <strong>Resumo</strong>
                                  </p>
                                  <p>
                                      <strong>Subtotal: </strong>
                                  </p>
                                  <p>
                                      <strong>Valor Total: </strong>
                                  </p>
                              </td>
                              <td>
                                  <p>
                                      <strong> </strong>
                                  </p>
                                  <p>
                                      <strong>${quantidadePlacas}</strong>
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
                  <div class="col-md-12">
                      <p><b>Data da Compra :</b> ${dataCompra}
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</div>
<a href="#" id="gerarPdfLink" class="card-link btn btn-primary">Gerar PDF</a>
  `);

  $('#gerarPdfLink').on('click', function () {
    window.location.href = '/fatura/pdf/' + vendaId + '/create'; // Substitua pela rota correta
  });

  $('#myModal').find('.modal-body').load(`pdf.index/${vendaId}`);
});

