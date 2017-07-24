<?php 
	session_start();
	if (!isset($_SESSION['auth'])) {
		header("location:../view/login.php?valid=false");
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Advertências</title>
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/painel.js"></script>
	<!-- Compiled and minified CSS -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
  	<!-- Compiled and minified JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>

	<div class="row">
		<div class="col s12">
			<form id="advert" action="../routes/routes.php" method="POST" name="formAdv">

				<!--PEGAR NOME DO RESPONSAVEL DIRETAMENTE DO LOGIN RELACIONADO EVITANDO TRETAS-->
				
				<div class="row">
					<div class="input-field col s8" id="motivo">
						<select>
							<option value="" disabled selected>Escolha uma das opções</option>	
							<option value="motivo1">Ausência em Reunião</option>
							<option value="motivo2">Atraso em Reuniões</option>
							<option value="motivo3">Ausência ou atraso nas atividades</option>
							<option value="motivo4">Ausência de resposta dos comunicados</option>
							<option value="motivo5">Ausência na sede no horário acordado</option>
							<option value="motivo6">Atitudes negativas</option>
						</select>
						<label>Motivo</label>
					</div>

				<div class="fixed-action-btn horizontal click-to-toggle">
					    <a class="btn-floating btn-large red">
					      <i class="material-icons">supervisor_account</i>
					    </a>
					    <ul>
							
					      <li><a id="logout" type="button" class="btn-floating blue" name="logout" title="Exit"><i class="material-icons">exit_to_app</i></a></li>
					    </ul>
	  				</div>
				</div>
				
				<div class="row">
					<div class="row input-field col s8" >
						<label for="birthdate" class="">Data</label>
						<input id="birthdate" type="date" class="datepicker" readonly="" tabindex="-1" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="birthdate_root">
					</div>	

				</div>

				<div class="row">		
					<div id="pont" class="input-field col s8">
					<label for="points">Pontos</label>
						<input id="points" type="text" name="pontos" disabled value=" ">
					</div>
				</div>
				<div class="row">
					<div class="input-field col s8">
					<label for="resp">Responsável</label>
						<input id="resp" type="text" name="responsavel" disabled value="<?php isset($_SESSION['nome']) ? print $_SESSION['nome'] : false; ?>">
						
					</div>
				</div>

				<button id="envAdv" type="button" class="btn waves-effect waves-light"  name="envAdv">Submit<i class="material-icons right">send</i></button>
				
			</form>
		</div>
	</div>

	
</body>
</html>

