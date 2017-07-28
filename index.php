<?php 

	header("location:view/login.php");

	session_start();

	if (isset($_SESSION['auth'])) {
		if ($_SESSION['auth']) {
			if($_SESSION['cargo']=="Diretor" || $_SESSION['cargo']=="Conselheiro"){
				
				header("location:../view/profileAdm.php");
			}else{
				header("location:../view/profile.php");
			}
		}
	}else{
		header("location:../view/login.php");
	}	
?>