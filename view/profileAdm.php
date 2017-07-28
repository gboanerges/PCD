<?php
    require_once("../controller/AdvertenciasController.class.php");
    session_start();
    if (!isset($_SESSION['auth'])) {
		header("location:../view/login.php?valid=false");
		
	}
    
    $advController = new AdvertenciasController(); 
    $advertencias = $advController->getAdvertenciasById($_SESSION['uid']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Advertências</title>
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/profileAdm.js"></script>
	<!-- Compiled and minified CSS -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
  	<!-- Compiled and minified JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    <ul id="dropdown1" class="dropdown-content">
        <li><a id="advBTN">Advertências</a></li>
        <li class="divider"></li>
        <li><a id="contasBTN">Contas</a></li>
    </ul>
	<nav id="nav">
		<div class="nav-wrapper">
		<a href="#" class="brand-logo center">Profile Admin</a>
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
				<table id="tabela" class="bordered highlight">
                    <thead>
                        <tr>
                            <td>Motivo</td>
                            <td>Data</td>
                            <td>Pontos</td>
                            <td>Responsável</td>
                            <td>Indeferida</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            for ($i=0; $i < sizeof($advertencias) ; $i++) {
                                echo "<tr>";
                                echo "<td>".$advertencias[$i]['motivo']."</td>";
                                echo "<td>".$advertencias[$i]['data']."</td>";
                                echo "<td>".$advertencias[$i]['pontos']."</td>";
                                echo "<td>".$advertencias[$i]['responsavel']."</td>";
                                echo "<td>".$advertencias[$i]['indeferida']."</td>";
                                echo "</tr>";					
                            }
                        ?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
	
</body>
</html>

