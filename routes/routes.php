<?php 
	
	require_once '../model/Membro.class.php';
	require_once '../model/Advertencia.class.php';
	require_once '../controller/AdvertenciasController.class.php';
	require_once '../controller/MembrosController.class.php';

	session_start();
	//Login
	if (isset($_POST['attempt'])){
		
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$codedSenha = md5($senha);

		unset($_POST['attempt']);

		$membrosController = new MembrosController();
		$user = $membrosController->auth($login, $codedSenha);

		if ($user) {
			
			$_SESSION['nome'] = $user['nome'];
			$_SESSION['uid'] = $user['id'];
			$_SESSION['auth']  = true;
			$_SESSION['cargo'] = $user['cargo'];

			if($user['cargo']=="Diretor" || $user['cargo']=="Conselheiro"){
				
				header("location:../view/profileAdm.php");
			}else{
				header("location:../view/profile.php");
			}
		}else{
			header("location:../view/login.php?valid=false");
		}
	}

	//Logout
	if (isset($_GET['action']) && $_GET['action'] == "logoff") {

		unset($_SESSION['auth']);
		unset($_GET['logoff']);
		session_destroy();
		header("location:../view/login.php");
	}
	
	//Cadastro
	if(isset($_POST['cadAttempt'])){

		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$nome = $_POST['nome'];
		$cargo = $_POST['selectCargo'];
		
		$codedSenha = md5($senha);
		unset($_POST['cadAttempt']);

		$membrosController = new MembrosController();
		$cad = $membrosController->cadastrarContas($login, $codedSenha, $nome, $cargo);
		if($cad){
			header("location:../view/gerenciarContas.php?cad=true");
		}else{
			header("location:../view/cadastro.php?cad=false");
		}
	}

	//Editar Conta
	if(isset($_POST['editAttempt'])){

		$login = $_POST['login'];
		
		$nome = $_POST['nome'];
		$cargo = $_POST['selectCargo'];
		$id = $_POST['userID'];

		unset($_POST['editAttempt']);

		$membroController = new MembrosController();
		$editar = $membroController->editarConta($id,$login, $nome, $cargo);

		if($editar >'0'){
			header("location:../view/gerenciarContas.php?edit=true");
		}
		else{
			header("location:../view/editarConta.php?edit=false");
		}
		
	}


	//Deletar Conta
	if(isset($_GET['deletarConta'])){
		$membroController = new MembrosController();

		$del = $membroController->deletarConta($_GET['deletarConta']);	
		//nao funcionou a verificacao, mas a funcao sim
		if($del > '0'){

			header("location:../view/gerenciarContas.php?delete=true");
		}else{
			header("location:../view/gerenciarContas.php?delete=false");
		}
	}
	//Adicionar advertencia
	if(isset($_POST['envAdv'])){

		unset($_POST['envAdv']);

		$motivo = $_POST['selectMotivo'];
		$data = $_POST['data'];
		$pontos = $_POST['pontos'];
		$responsavel = $_POST['responsavel'];
		$indeferida = $_POST['selectIndef'];
		$membro = $_POST['membro'];

		$membrosController = new MembrosController();
   		$conta = $membrosController->getContaByNome($membro);
		$membroId = $conta[0]['id'];
		

		$advController = new AdvertenciasController();
		$add = $advController->addAdvertenciaDB($motivo, $data, $pontos, $responsavel, $indeferida, $membroId);
		if($add){
			header("location:../view/advertencias.php?add=true");
		}else{
			header("location:../view/painel.php?add=false");
		}

	}

	//Editar advertencia
	if(isset($_POST['editAdv'])){

		$motivo = $_POST['selectMotivo'];
		$data = $_POST['data'];
		$pontos = $_POST['pontos'];
		$responsavel = $_POST['responsavel'];
		$indeferida = $_POST['selectIndef'];
		$idAdv = $_POST['advId'];
		unset($_POST['editAdv']);

		$advController = new AdvertenciasController();
		$editar = $advController->editarAdvertencia($motivo, $data, $pontos, $responsavel, $indeferida, $idAdv);
		
		if($editar =='0'){
			header("location:../view/advertencias.php?edit=false");

		}else{
			header("location:../view/advertencias.php?edit=true");
		}
	}

	if(isset($_GET['deletarAdv'])){
		
		$advController = new AdvertenciasController();

		$del = $advController->deletarAdvertencia($_GET['deletarAdv']);	
		//nao funcionou a verificacao, mas a funcao sim
		if($del > '0'){

			header("location:../view/gerenciarContas.php?delete=true");
		}else{
			header("location:../view/gerenciarContas.php?delete=false");
		}
	}
	
	
?>