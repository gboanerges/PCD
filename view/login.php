<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login - PCD EcompJr</title>
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
  	<!-- Compiled and minified JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<form id="form" action="../routes/routes.php" method="POST">
		<input class="" type="text" name="login" placeholder="Usuário"><br><br>
		<input class="" type="password" name="senha" placeholder="Senha"><br><br> 

		<button class="btn waves-effect waves-light" type="submit" name="attempt">Login<i class="material-icons right"></button>
	</form>
</body>
</html>