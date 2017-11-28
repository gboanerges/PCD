$(document).ready(function(){

    $('select').material_select();

    $("#regras").click(function(){

		window.location= "http://localhost:8081/view/regras.php";
     });
     
    $("#advBTN").click(function(){

        window.location= "http://localhost:8081/view/advertencias.php";
    });

    $("#contasBTN").click(function(){

        window.location= "http://localhost:8081/view/gerenciarContas.php";
    });
    //PEGAR O CARGO DA CONTA A SER EDITADA E EXIBIR NO CAMPO SELECT
});
