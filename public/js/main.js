$(document).ready(function() {
  
    $.get("/total-vendas", function(data) {
        
        var totalVendas = data.totalVendas;
       
        $(".vendas").text("R$ " + totalVendas);
    });
});