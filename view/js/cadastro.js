$(document).ready(function(){

    $('select').material_select();
     
    $("#advBTN").click(function(){

        window.location= "http://localhost:8080/view/advertencias.php";
    });

    $("#contasBTN").click(function(){

        window.location= "http://localhost:8080/view/gerenciarContas.php";
    });
    
    $("#regras").click(function(){

        window.location= "http://localhost:8080/view/regras.php";
    });
});
