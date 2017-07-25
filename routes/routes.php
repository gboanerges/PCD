<?php 
	
	require_once '../model/Membro.class.php';
	require_once '../model/Advertencia.class.php';
	require_once '../controller/AdvertenciasController.class.php';

	session_start();

	if (isset($_POST['attempt'])){
		
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		

		unset($_POST['attempt']);

		$member = new Membro($login, $senha, "", "", "");
		$user = $member->auth();

		if ($user) {
			
			$_SESSION['nome'] = $user['nome'];
			$_SESSION['auth'] = true;
			$_SESSION['uid'] = $user['id'];
			
			header("location:../view/painel.php");

		}else{
			header("location:../view/login.php?valid=false");
		}
	}
	
	if (isset($_GET['action']) && $_GET['action'] == "logoff") {

		unset($_SESSION['auth']);
		unset($_GET['logoff']);
		session_destroy();
		header("location:../view/login.php");
	}

	if(isset($_POST['envAdv'])){

		$motivo = $_POST['selectMotivo'];
		$data = $_POST['data'];
		$pontos = $_POST['pontos'];
		$responsavel = $_POST['responsavel'];
		$indeferida = $_POST['selectIndef'];

		unset($_POST['envAdv']);

		$advController = new AdvertenciasController();
		$add = $advController->addAdvertenciaDB($motivo, $data, $pontos, $responsavel, $indeferida);
		if($add){
			header("location:../view/painel.php?add=true");
		}else{
			header("location:../view/painel.php?add=false");
		}

	}
?>