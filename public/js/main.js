$(document).ready(function() {
  
    $.get("/total-vendas", function(data) {
        
        var totalVendas = data.totalVendas;
       
        $(".vendas").text("R$ " + totalVendas);
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


