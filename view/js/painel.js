function updatePoints() {
    var x = document.getElementById("#qtdDias").value;
    document.getElementById("#points").innerHTML = x;
}

$(document).ready(function(){

	$('select').material_select();

	$('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 15 // Creates a dropdown of 15 years to control year
 	 });


	$("#motivo").change(function() {
 		if ($("#motivo option:selected").val() == "" ){

			$("#points").val("");
		}
 		else if ($("#motivo option:selected").val() == "motivo1" ){

			$("#points").val("4");

		}else if ($("#motivo option:selected").val() == "motivo2" ){

			$("#points").val("2");

		}else if ($("#motivo option:selected").val() == "motivo3" ){
			
			//ESCONDER O INPUT QTD DIAS QUANDO ESCOLHER OUTRA OPCAO
			
			if (!($("#qtdDias").is(":visible")) ){
				$("#motivo").append('<div class="row"><div class="input-field col s8"><input id="qtdDias" type="number" name="qtdDias" placeholder="Qtd dias" min="1" size="2"></div></div>');
			}else{
				$("#qtdDias").change(function() { 	
					$("#points").val($("#qtdDias").val()*2);
				});
			}

		}else if ($("#motivo option:selected").val() == "motivo4" ){

			$("#points").val("2");

		}else if ($("#motivo option:selected").val() == "motivo5" ){

			$("#points").val("4");

		}else if ($("#motivo option:selected").val() == "motivo6" ){
				
			$("#points").val("10");
		}
	});
  		
	$("#envAdv").click(function(){
		if($("#motivo option:selected").val()==""){
			alert("Escolha uma opção!");
		}else{
			location.href='../routes/routes.php';
		}
	});
	
	$("#logout").click(function(){
			
		location.href='../routes/routes.php';

	});

});

