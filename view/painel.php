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
	<link rel="stylesheet" type="text/css" href="css/painel.css">
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/painel.js"></script>
	<!-- Compiled and minified CSS -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
  	<!-- Compiled and minified JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
	<nav id="nav">
		<div class="nav-wrapper">
		<a href="#" class="brand-logo center">Advertências</a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a id="logout" type="button" name="logoff">Logout</a></li> 
		</ul>
		</div>
 	</nav>

	<div class="container">
		<div class="row">
			<div class="col s12">
				<form id="advert" action="../routes/routes.php" method="POST" name="formAdv">
					
					<div class="row">
						<div class="input-field col s12" id="motivo">
							<select name="selectMotivo" required="required">
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
					</div>
					
					<div class="row">
						<div class="row input-field col s12" >
							<label for="birthdate" class="">Data</label>
							<input id="birthdate" name="data" type="date" class="datepicker" readonly="" tabindex="-1" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="birthdate_root">
						</div>	

					</div>

					<div class="row">		
						<div id="pont" class="input-field col s12">
						<label for="points">Pontos</label>
							<input id="points" type="text" name="pontos" readonly="readonly" value=" ">
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
						<label for="resp">Responsável</label>
							<input id="resp" type="text" name="responsavel" readonly="readonly" value="<?php isset($_SESSION['nome']) ? print $_SESSION['nome'] : false; ?>">
							
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<select name="selectIndef" id="indef">
								<option value="0" selected>Não</option>
								<option value="1" >Sim</option>
							</select>
							<label>Indeferida</label>
						</div>
					</div>
					<div class="row">
						<div class="col s3">
							<button id="envAdv" type="submit" class="btn waves-effect waves-light"  name="envAdv">Submit<i class="material-icons right">send</i></button>
						</div>		
					</div>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>

