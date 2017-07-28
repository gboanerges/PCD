$(document).ready(function(){
    
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
    
     $("#regras").click(function(){

        window.location= "http://localhost:8080/view/regras.php";
    });
});