$(document).ready(function(){
       
  
    $('.btn').click(function() { 
        var button = this.id;
        
        if(button=="btn1"){
          $("#motivo1").collapse('toggle');

        }else if (button=="btn2"){
          $("#motivo2").collapse('toggle');

        }else if (button=="btn3"){         
          $("#motivo3").collapse('toggle');

        }else if (button=="btn4"){
          $("#motivo4").collapse('toggle');

        }else if (button=="btn5"){
          $("#motivo5").collapse('toggle');

        }else if (button=="btn6"){
          $("#motivo6").collapse('toggle');

        }         
    });

    $("#logout").click(function(){

		$.ajax({
            url: 'http://localhost:8081/routes/routes.php',
            type: 'get',
            data:{action:'logoff'},
            success: function(){
            alert("Deslogado com sucesso!");
                location.reload();
            }
        });
   });
   
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
  
   $("#regras").click(function(){

        window.location= "http://localhost:8081/view/regras.php";
    });

    $("#advBTN").click(function(){

      window.location= "http://localhost:8081/view/advertencias.php";
  });

  $("#contasBTN").click(function(){

      window.location= "http://localhost:8081/view/gerenciarContas.php";
  });


});
