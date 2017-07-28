<?php
     require_once("../controller/MembrosController.class.php");
	session_start();
    if (!isset($_SESSION['auth'])) {
		header("location:../view/login.php?valid=false");
		
	}
    $adm = null;
    //Verica o cargo do usuario, para exibir botao de gerenciar na navbar
    //caso este seja administrador
    if(isset($_SESSION['cargo'])){
        if($_SESSION['cargo']=="Diretor" ||$_SESSION['cargo']=="Conselheiro"){
            $adm = true;
        }
    }else{
        echo "nada";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/regras.css" />
    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/regras.js"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
  	<!-- Compiled and minified JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Regras PCD</title>
</head>
<body>
    <ul id="dropdown1" class="dropdown-content">
        <li><a id="advBTN">Advertências</a></li>
        <li class="divider"></li>
        <li><a id="contasBTN">Contas</a></li>
    </ul>
    <nav id="nav">
		<div class="nav-wrapper">
		<a href="#" class="brand-logo center">Regras PCD</a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a id="regras" type="button">Regras</a></li> 
            <?php if($adm){echo '<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Gerenciar<i class="material-icons right">settings</i></a></li>';}?>
            <li><a id="logout" type="button" name="logoff">Logout</a></li> 
            
		</ul>
		</div>
 	</nav>
    <div class="container">
        <div class="row">
            <div class="col s12" >
              <div class="page-header"><h3>Programa de Controle Multidisciplinar</h3></div>   
                    <div id="info" class="well text-justify">
                        <p>O programa de controle disciplinar tem o objetivo de alertar e fiscalizar
                        comportamentos que de certa maneira podem influenciar negativamente o
                        desenvolvimento da empresa e do membro, a fim de melhorar seu desempenho
                        profissional e a responsabilidade do mesmo para com a empresa.
                        <br>
                        <p> Cada membro terá direito a <strong>20 pontos</strong> que serão renovados todo início de ano
                            (1 de janeiro), cada infração que o mesmo tiver será reduzido do seu valor total, até
                            que este membro não possua mais pontos e assim haja a possibilidade do seu
                            desligamento como membro efetivo da empresa, após determinação de uma
                            assembleia.
                        </p>
                        
                        <p> O membro será notificado através de email ou reunião presencial de suas
                            infrações para que assim ele perceba seu comportamento inadequado em
                            determinadas situações. O membro após notificado terá direito à defesa, desde que
                            seja enviado um email em um prazo de 7 (sete) dias com a defesa bem
                            fundamentada, podendo esta ser aceita ou indeferida.
                        </p>
                        
                       
                    </p>

                    </div>   
                <div class="row">
                    <div id="motivos" class="col12 text-justify">
                        <h4> O membro, poderá <b>perder</b> pontos por:</h4>
                        <br>
                        <button id="btn1" class="btn waves-effect waves-light">1. Ausência nas reuniões</button>
                            
                        <div id="motivo1" data-toggle="collapse" class="accordion-toggle collapse out ">
                            <p>Faltar alguma reunião que foi marcada com pelo menos 72 horas (3 dias) de
                                antecedência sem nenhuma justificativa plausível.
                                Obs.1 Entende-se como justificativa plausível: motivos médicos (desde que
                                apresentado atestado), aula extra marcada por professor no horário da reunião.
                                Obs.2 As reuniões não poderão ser marcadas em horários que indique
                                impossibilidade devido à aulas ou reuniões de iniciação científica.
                                <br>
                                <p><strong>Penalidade: 4 Pontos </strong></p>
                            </p>
                        </div>
                        <br>
                        <button id="btn2" class="btn waves-effect waves-light" title="Reuniões ao qual foi solicitado">2. Por atraso nas reuniões</button>
                        <div id="motivo2" data-toggle="collapse" class="accordion-toggle collapse out">
                            <p>Atrasar por mais de 15 minutos em alguma reunião que foi marcada com pelo
                            menos 72 horas (3 dias) sem aviso prévio justificando o atraso.
                            Obs.1 O atraso deverá ser justificado com pelo menos 12 horas de
                            antecedência.
                            Obs.2 Após 20 minutos caso o membro não tenha chegado, será tratado
                            como ausência em reunião.
                            Obs.3 Imprevistos podem ser considerados como justificativa caso a outra
                            parte afetada aceite-a.
                            <br>
                            <p><strong>Penalidade: 2 Pontos</strong></p>
                            </p>
                        </div>
                        <br>
                        <button id="btn3" class="btn waves-effect waves-light" title=" Atividades para os quais forem designados"> 3. Ausência/atraso nas atividades</button>
                            <div id="motivo3" data-toggle="collapse" class="accordion-toggle collapse out">
                                <p>Atrasar ou não entregar pontualmente alguma meta de projeto que lhe tenha
                                sido passada sem justificativa aceitável.
                                Obs.1 Entende-se como justificativa aceitável algum fator externo que de certa
                                forma pode ter contribuído para o atraso na entrega, como por exemplo a
                                disponibilidade de algum serviço de terceiros (e.g. servidor fora do ar) ou motivos de
                                doença (desde que apresentado atestado que corresponda a pelo menos ⅓ do prazo
                                que foi dado para resolução da meta). Outros motivos poderão também ser incluídos,
                                desde que conversados e acordados com o Diretor de Projetos e/ou de Recursos
                                Humanos.
                                Obs. 2 A cada dia de atraso são perdidos 2 pontos até um total de 3 dias de
                                atraso, situação na qual é considerada ausência da atividade e a tarefa deverá ser
                                remanejada.
                                <br>
                                <p><strong>Penalidade: 2 Pontos por dia de atraso.</strong></p>
                                </p>
                            </div>
                            <br>
                        <button id="btn4" class="btn waves-effect waves-light" title="Comunidados internos"> 4. Ausência de resposta dos comunicados</button>
                        <!--COLLAPSE OUT deixa o conteudo escondido por default -->
                        <div id="motivo4" data-toggle="collapse" class="accordion-toggle collapse out">
                                <p>Presumem-se lidas as correspondências eletrônicas em um prazo de 48 horas,
                                assim o membro terá até este prazo para resposta de emails (quando necessário).
                                Obs.1 Alguns emails poderão receber prazo maior, desde que explicitados os
                                seus prazos no corpo do texto. Caso o membro não possa responder por algum
                                motivo, este motivo deverá ser expresso antes da finalização do prazo de resposta
                                do email, sinalizando a falta de resposta .
                            <br>
                                <p><strong>Penalidade: 2 Pontos</strong></p>
                                </p>
                            </div>
                            <br>
                        <button id="btn5" class="btn waves-effect waves-light"> 5. Ausência na sede no horário acordado</button>
                            <div id="motivo5" data-toggle="collapse" class="accordion-toggle collapse out">
                                <p>O membro poderá faltar no seu horário por motivos pessoais desde que não
                                seja recorrente (2 vezes em 2 semanas) e estas faltas deverão ser sinalizadas com
                                pelo menos 12 horas de antecedência para o diretor de recursos humanos.
                                Obs.1 O membro que precise faltar mais do que 1 vez em um período de 15
                                dias deverá apresentar justificativa plausível (e.g. atestado médico, aula extra e entre
                                outros).
                            <br>
                                <p><strong> Penalidade: 4 Pontos</strong></p>
                                </p>
                            </div>
                            <br>
                            <button id="btn6" class="btn waves-effect waves-light" title="Atitudes que possam denegrir a imagem, ofender a dignidade ou conter
                                preconceito de natureza pejorativa">6. Atitudes negativas</button>
                            <div id="motivo6" data-toggle="collapse" class="accordion-toggle collapse out">
                                <p>O membro será punido caso haja de maneira desrespeitosa com outro membro
                                durante encontros (reunião, integração, assembleias) fazendo algum comentário
                                impróprio/inadequado.
                                Obs.1 O membro que se sentir ofendido de certa maneira deverá reportar o
                                acontecido ao diretor de recursos humanos, para que assim os dois lados sejam
                                ouvidos e as devidas providências sejam tomadas.
                                <br>
                                <p><strong>Penalidade: 10 Pontos</strong></p>
                                </p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>