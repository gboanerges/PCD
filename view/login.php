<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login - PCD EcompJr</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
  	<!-- Compiled and minified JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<nav id="nav">
		<div class="nav-wrapper">
			<a class="brand-logo center">PCD</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
            
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
							<input id="user" type="text" name="login" placeholder="Usuário"><br><br>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<label for="senha">Password</label>
							<input id="senha" type="password" name="senha" placeholder="Senha"><br><br> 
						</div>
					</div>
					<button id="logBTN" class="btn waves-effect waves-light" type="submit" name="attempt">Login<i class="material-icons right"></button>
				</form>
			</div>
		</div>	
	</div>
</body>
</html>