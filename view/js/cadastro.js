$(document).ready(function(){

    $('select').material_select();
     
    $("#advBTN").click(function(){

        window.location= "http://localhost:8081/view/advertencias.php";
    });

    $("#contasBTN").click(function(){

        window.location= "http://localhost:8081/view/gerenciarContas.php";
    });
    
    $("#regras").click(function(){

        window.location= "http://localhost:8081/view/regras.php";
    });
});
