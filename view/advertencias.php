<?php
    require_once("../controller/AdvertenciasController.class.php");
    require_once("../controller/MembrosController.class.php");

	session_start();
    if (!isset($_SESSION['auth'])) {
		header("location:../view/login.php?valid=false");
		
	}
    if(isset($_SESSION['cargo'])){
        if($_SESSION['cargo']=="Diretor" || $_SESSION['cargo']=="Conselheiro"){
          
        }else{
            header("location:../view/profile.php?adm=false");
        }
    }

    $advController = new AdvertenciasController(); 
    

    $membrosController = new MembrosController();
    $contas = $membrosController->getContas();

    $idAdv = null;
    $idConta = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Advertências</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/advertencias.css" />
    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/advertencias.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
		<a href="#" class="brand-logo center">Advertências Ecompjr</a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a id="regras" type="button">Regras</a></li> 
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Gerenciar<i class="material-icons right">settings</i></a></li>
            <li><a id="logout" type="button" name="logoff">Logout</a></li> 
		</ul>
		</div>
     </nav>
     
    <div class="container-fluid ">
        <div class="col-lg-offset-2 col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3>Membros</h3></div>
                    <div class="panel-body">
                        <table id="mainTable" class="table table-condensed table-hover table-responsive" style="border-collapse:collapse;">

                            <thead>
                                <tr>                                    
                                    <th>Nome</th>
                                    <th>Cargo</th>        
                                    <th>&nbsp;</th>                     
                                </tr>
                            </thead>

                            <tbody>
                                <!-- MAIN TABLE ROW-->
                                <?php 
                                    for ($i=0; $i < sizeof($contas) ; $i++) {
                                        $id = $contas[$i]['nome'];
                                        
                                        echo "<td>".$contas[$i]['nome']."</td>";
                                        echo "<td>".$contas[$i]['cargo']."</td>";
                                        
                                        
                                        echo "</tr>";	
                                        echo '<td colspan="12"><div class="" id=""> 
                                                        <table id="innerTable" class="table table-responsive table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Motivo</th>
                                                                        <th>Data</th>
                                                                        <th>Pontos</th>
                                                                        <th>Responsável</th>
                                                                        <th>Indeferida</th>
                                                                    </tr>
                                                                    
                                                                </thead>';
                                        $advertencias = $advController->getAdvertenciasDB($contas[$i]['id']);
                                        for ($x=0; $x < sizeof($advertencias) ; $x++) {
                                            if($contas[$i]['id']==$advertencias[$x]['membro']){
                                                
                                                $idAdv = $advertencias[$x]['id'];
                                                echo '<tr>';
                                        
                                                echo '<tbody>';
                                                        echo '<tr>';
                                                            echo "<td>".$advertencias[$x]['motivo']."</td>";
                                                            echo "<td>".$advertencias[$x]['data']."</td>";
                                                            echo "<td>".$advertencias[$x]['pontos']."</td>";
                                                            echo "<td>".$advertencias[$x]['responsavel']."</td>";
                                                            echo "<td>".$advertencias[$x]['indeferida']."</td>";    
                                                            echo "<td><button id='btnEdit' class=\"botaoE\" onclick=\"editAdv($idAdv)\"><i class=\"material-icons\">edit</i></button><button id='btnDelete' class=\"botaoD\" onclick=\"deleteAdv($idAdv)\"><i class=\"material-icons\">delete</i></button></td>";
                                                        echo '</tr>  
                                                        
                                                    </tbody>';
                                                
                                            }
                                        }		
                                        echo '</table>
                                                        </div> 
                                                    </td>';
                                                echo '</tr>';		
                                    }
                                ?>
                               
                                   
                                  
                            </tbody>
                        </table>
                </div>

            </div>  
            <div class="row">
                <div class="col s3">
                    <button id="add" type="button" class="btn waves-effect waves-light">Nova advertência</button>
                </div>		
            </div> 
        </div>
    </div>

</body>
</html>

