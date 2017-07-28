<?php 
	
	require_once("../database/Connection.class.php");

	class MembrosController {
		
		private $conn = null;

		function __construct()
		{
			$this->conn = Connection::getInstance();
		}

		public function auth($login, $senha){
			// acessar o banco
			// procurar por ela mesma
			// verificar se o valor de login e senha são iguais
			
			$conn = Connection::getInstance();
			$queryAuth = "SELECT * FROM usuarios WHERE login = \"$login\" AND senha = \"$senha\";";
			$sql = $conn->query($queryAuth);
			$row = $sql->fetch(PDO::FETCH_ASSOC);
			
			return $row;
		}	
		
		public function cadastrarContas($login, $senha, $nome, $cargo){
			$conn = Connection::getInstance();
			$queryCad = "INSERT INTO usuarios (`login`, `senha`, `nome`, `cargo`) VALUES (\"$login\", \"$senha\", \"$nome\", \"$cargo\");";
			$sql = $conn->query($queryCad);
			return $sql;
		}

		//Funcao que retorna todas as contas cadastradas
		public function getContas(){

			$contas = [];
			$conn = Connection::getInstance();
			$query = "SELECT * FROM usuarios;";
			$sql = $conn->query($query);
			while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        	array_push($contas, $row);
       		}
			return $contas;
		}

		public function getContaById($id){

			$contas = [];
			$conn = Connection::getInstance();
			$query = "SELECT * FROM usuarios WHERE id=\"$id\";";
			$sql = $conn->query($query);
			while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        	array_push($contas, $row);
       		}
			return $contas;
		}
		//Funcao que retorna a conta referente ao id recebido como parametro
		public function getContaByNome($nome){

			$contas = [];
			$conn = Connection::getInstance();
			$query = "SELECT * FROM usuarios WHERE nome=\"$nome\";";
			$sql = $conn->query($query);
			while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        	array_push($contas, $row);
       		}
			return $contas;
		}

		//Funcao que atualiza informacoes da conta
		public function editarConta($id, $login, $nome, $cargo){

			$conn = Connection::getInstance();
			$query = "UPDATE usuarios SET login=\"$login\", nome=\"$nome\", cargo=\" $cargo\" WHERE id=\"$id\";";
			$sql = $conn->query($query);
			
			return $sql;
		}

		//Funcao que deleta a conta
		public function deletarConta($id){

			$conn = Connection::getInstance();
			$query = "DELETE FROM usuarios WHERE id=\"$id\";";
			$sql = $conn->query($query);
			
			return $sql;
		}
	}
?>