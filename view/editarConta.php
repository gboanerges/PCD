<?php
    session_start();
	require_once("../controller/MembrosController.class.php");
	if (!isset($_SESSION['auth'])) {
		header("location:../view/login.php?valid=false");
		
	}
    $membrosController = new MembrosController();
	if(isset($_SESSION['cargo'])){
        if($_SESSION['cargo']=="Diretor" || $_SESSION['cargo']=="Conselheiro"){
            if(isset($_GET['userId'])){
		$contas = $membrosController->getContaById($_GET['userId']);
	}

        }else{
            header("location:../view/profile.php?adm=false");
        }
    }
	
    
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PCD EcompJr</title>
    <link rel="stylesheet" type="text/css" href="css/cadastro_editar.css">
    
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/editarConta.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
  	<!-- Compiled and minified JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<ul id="dropdown1" class="dropdown-content">
        <li><a id="advBTN">Advertências</a></li>
        <li class="divider"></li>
        <li><a id="contasBTN">Conta</a></li>
    </ul>
	<nav id="nav">
		<div class="nav-wrapper">
		<a href="#" class="brand-logo center">Editar Conta</a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a id="regras" type="button">Regras</a></li> 
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Gerenciar<i class="material-icons right">settings</i></a></li>
            <li><a id="logout" type="button" name="logoff">Logout</a></li> 
		</ul>
		</div>
     </nav>
	<div class="container">
		<div class="row">
			<div class="col s12">
				<form id="form" action="../routes/routes.php" method="POST">
					<div class="row">
						<div class="input-field col s12">
							<label for="user">Login</label>
							<input id="user" type="text" name="login" placeholder="Usuário" value="<?php print $contas[0]['login']; ?>"><br><br>
						</div>
					</div>
					
                    
                    <div class="row">
						<div class="input-field col s12">
							<label for="user">Nome</label>
							<input id="user" type="text" name="nome" placeholder="Nome" value="<?php print $contas[0]['nome']; ?>"><br><br>
						</div>
					</div>
                    <div class="row">
						<div class="input-field col s12" id="cargo">
							<select id="idCargo" name="selectCargo">
								
								<option value="" disabled selected>Escolha uma das opções</option>	
								<option value="Conselheiro">Conselheiro</option>
								<option value="Diretor">Diretor</option>
                                <option value="Membro">Membro</option>
                                <option value="Trainee">Trainee</option>
								
							</select>
							<label>Cargo</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<label for="userID">ID</label>
							<input id="userID" type="text" name="userID" readonly="readonly"value="<?php print $contas[0]['id']; ?>"><br><br>
						</div>
					</div>
                    <!--
                    <div class="row">
						<div class="file-field input-field col s12">
                            <div id="fotoBTN" class="btn">
                                <span>Foto</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    -->
					<button id="cadBTN" class="btn waves-effect waves-light" type="submit" name="editAttempt">Editar<i class="material-icons right"></button>
				</form>
			</div>
		</div>	
	</div>
</body>
</html>