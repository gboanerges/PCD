<?php 
	
	require_once '../model/Membro.class.php';

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
	
	if (isset($_POST['logout'])) {

		unset($_SESSION['auth']);
		unset($_POST['logout']);
		session_destroy();
		header("location:../view/login.php");
	}else{
		echo "else";
		
	}

	if(isset($_POST['envAdv'])){
		echo "enviou";
	}
?>