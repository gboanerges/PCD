

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

			$("#qtdDias").change(function() { 	
				$("#points").val($("#qtdDias").val()*2);
			});
			if (!($("#qtdDias").is(":visible")) ){
				$("#motivo").append('Qtd de Dias: <input id="qtdDias" type="number" name="qtdDias" min="1" size="2">');
			}

		}else if ($("#motivo option:selected").val() == "motivo4" ){

			$("#points").val("2");

		}else if ($("#motivo option:selected").val() == "motivo5" ){

			$("#points").val("4");

		}else if ($("#motivo option:selected").val() == "motivo6" ){
				
			$("#points").val("10");
		}
	});
  		
	
	$("#envPainel").click(function(){
			
		

	});

	$("#logout").click(function(){
			
		location.href='../routes/routes.php';

	});

});

