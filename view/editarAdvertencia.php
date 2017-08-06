<?php 
	 session_start();
	 require_once("../controller/AdvertenciasController.class.php");
	if (!isset($_SESSION['auth'])) {
		header("location:../view/login.php?valid=false");
		
	}
	$advController = new AdvertenciasController();
	if(isset($_SESSION['cargo'])){
        if($_SESSION['cargo']=="Diretor" || $_SESSION['cargo']=="Conselheiro"){
            if(isset($_GET['advId'])){

				$idAdv = $_GET['advId'];
				$adv = $advController->getAdvertenciasById($idAdv);
			}
        }else{
            header("location:../view/profile.php?adm=false");
        }
    }	
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Advertências</title>
	<link rel="stylesheet" type="text/css" href="css/painel.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/editarAdv.js"></script>
	<!-- Compiled and minified CSS -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
  	<!-- Compiled and minified JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
	 <!-- Dropdown Structure Navbar Gerenciar -->
	<ul id="dropdown1" class="dropdown-content">
        <li><a id="advBTN">Advertências</a></li>
        <li class="divider"></li>
        <li><a id="contasBTN">Contas</a></li>
    </ul>
	<nav id="nav">
		<div class="nav-wrapper">
		<a href="#" class="brand-logo center">Editar Advertência</a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a id="regras" type="button">Regras</a></li> 
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Gerenciar<i class="material-icons right">settings</i></a></li>
			<li><a id="logoutEditAdv" type="button" name="logoff">Logout</a></li> 
		</ul>
		</div>
 	</nav>

	<div id="divConteudo" class="container">
		
		<h4 class="text-justify">Editar Advertência</h4>
		<div class="row">
			<div class="col s12">
				<form id="advert" action="../routes/routes.php" method="POST" name="formAdv">
					
					<div class="row">
						<div class="input-field col s12" id="motivo">
							<select id="idMotivo" name="selectMotivo">
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
						<div class="input-field col s8">
							<input id="qtdDias" type="number" name="qtdDias" title="Disponível apenas para o 3º motivo." placeholder="Qtd dias" min="1" size="2">
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12" >
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
						<div id="membro" class="input-field col s12">
						<label for="points">Infrator</label>
							<input id="membro" type="text" name="membro" value="<?php print $adv[0]['id']; ?>" readonly="readonly">
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
							<select id="idIndef" name="selectIndef">
								<option value="0" selected>Não</option>
								<option value="1" >Sim</option>
							</select>
							<label>Indeferida</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<label for="advID">ID</label>
							<input id="advID" type="text" name="advId" readonly="readonly" value="<?php print $adv[0]['id']; ?>"><br><br>
						</div>
					</div>
					<div class="row">
						<div class="col s3">
							<button id="editAdv" type="submit" class="btn waves-effect waves-light"  name="editAdv">Editar<i class="material-icons right">send</i></button>
						</div>		
					</div>
				</form>
			</div>
		</div>
	</div>
	<br>

	
</body>
</html>

