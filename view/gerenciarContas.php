<?php
    session_start();
    require_once("../controller/MembrosController.class.php");
    if (!isset($_SESSION['auth'])) {
		header("location:../view/login.php?valid=false");
		
	}
    
    $adm = null;
    //Verica o cargo do usuario, para exibir botao de gerenciar na navbar
    //caso este seja administrador
    if(isset($_SESSION['cargo'])){
        if($_SESSION['cargo']=="Diretor" || $_SESSION['cargo']=="Conselheiro"){
            $adm = true;
        }else{
            header("location:../view/profile.php?adm=false");
        }
    }
    $membrosController = new MembrosController();
    $contas = $membrosController->getContas();
    $id = null;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PCD</title>
    <link rel="stylesheet" type="text/css" href="css/gerenciarContas.css">
    
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/gerenciarContas.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
  	<!-- Compiled and minified JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

    <!-- Dropdown Structure Gerenciar Contas -->
    <ul id='dropdownSettings' class='dropdown-content'>
       
        <li><a href="#!"><i class="material-icons">edit</i></a></li>
        <li><a href="#!"><i class="material-icons">delete</i></a></li>
    </ul>
     <!-- Dropdown Structure Navbar Gerenciar -->
	<ul id="dropdown1" class="dropdown-content">
        <li><a id="advBTN">Advertências</a></li>
        <li class="divider"></li>
        <li><a id="contasBTN">Contas</a></li>
    </ul>
	<nav id="nav">
		<div class="nav-wrapper">
		<a href="#" class="brand-logo center">Gerenciar Contas</a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a id="regras" type="button">Regras</a></li> 
            <!-- Dropdown Trigger -->
           <?php if($adm){echo '<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Gerenciar<i class="material-icons right">settings</i></a></li>';}?>
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
                            <td>Login</td>
                           
                            <td>Nome</td>
                            <td>Cargo</td>
                            <th id="emptyTR">&nbsp;</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            for ($i=0; $i < sizeof($contas) ; $i++) {
                                $id = $contas[$i]['id'];
                                echo "<tr>";
                                echo "<td>".$contas[$i]['login']."</td>";
                                echo "<td>".$contas[$i]['nome']."</td>";
                                echo "<td>".$contas[$i]['cargo']."</td>";
                                
                                echo "<td><button id='btnEdit' class=\"botaoE\" onclick=\"editId($id)\"><i class=\"material-icons\">edit</i></button><button id='btnDelete' class=\"botaoD\" onclick=\"deleteId($id)\"><i class=\"material-icons\">delete</i></button></td>";
                                echo "</tr>";					
                            }
                        ?>
                    </tbody>
                </table>
                <br>
            </div>
            <div class="row">
                <div class="col s3">
                    <button id="cadastrar" type="button" class="btn waves-effect waves-light"  >Cadastrar</button>
                </div>		
            </div>
		</div>	
	</div>
</body>
</html>
<!--
<a id='membroBTN' class='dropdown-button btn' href='#' data-activates='dropdownSettings'><i class=\"material-icons\">settings</i></a>
-->