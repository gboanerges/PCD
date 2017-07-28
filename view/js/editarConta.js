$(document).ready(function(){

    $('select').material_select();

    $("#regras").click(function(){

		window.location= "http://localhost:8080/view/regras.php";
     });
     
    $("#advBTN").click(function(){

        window.location= "http://localhost:8080/view/advertencias.php";
    });

    $("#contasBTN").click(function(){

        window.location= "http://localhost:8080/view/gerenciarContas.php";
    });
    //PEGAR O CARGO DA CONTA A SER EDITADA E EXIBIR NO CAMPO SELECT
});
