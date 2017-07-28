function editAdv(idAdv){
  
  window.location= "http://localhost:8080/view/editarAdvertencia.php?advId="+idAdv;

}

function deleteAdv(id){
  
  $.ajax({
      url: 'http://localhost:8080/routes/routes.php',
      type: 'get',
      data:{deletarAdv: id},
      success: function(){
      alert("Advertencia deletada com sucesso!");
          location.reload();
      },
      fail: function(){
      alert("Erro ao deletar!");
          location.reload();
      }

  });

}

$(document).ready(function(){

  $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation

    }
  );

  $("#add").click(function(){

      window.location= "http://localhost:8080/view/painel.php";
  });

  $("#advBTN").click(function(){

      window.location= "http://localhost:8080/view/advertencias.php";
  });


  $("#contasBTN").click(function(){

      window.location= "http://localhost:8080/view/gerenciarContas.php";
  });

  $("#regras").click(function(){

      window.location= "http://localhost:8080/view/regras.php";
  });

  $("#logout").click(function(){

		$.ajax({
            url: 'http://localhost:8080/routes/routes.php',
            type: 'get',
            data:{action:'logoff'},
            success: function(){
            alert("Deslogado com sucesso!");
                location.reload();
            }
        });
   });

});

