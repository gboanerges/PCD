<?php 

require_once '../database/Connection.class.php';
	
	class Membro
	{	
		public $id = null;
		public $login=null;
		public $senha=null;
		public $nome=null;
		public $cargo=null;
		public $privilegio=null;
		
		public $historico = null;
		public $foto = null;

		function __construct($login, $senha, $nome, $cargo, $privilegio){
			$this->login = $login;
			$this->senha = $senha;
			$this->nome = $nome;		
			$this->cargo = $cargo;		
			$this->privilegio = $privilegio;				
		}

		//get e set Login
		public function getId(){
			return $this->id;
		}	

		public function setId($id){
			$this->id = $id;
		}

		//get e set Login
		public function getLogin(){
			return $this->login;
		}	

		public function setLogin($login){
			$this->login = $login;
		}


		//get e set senha 
		public function getSenha(){
			return $this->senha;
		}	

		public function setSenha($senha){
			$this->senha = $senha;
		}	

		//get e set nome
		public function getNome(){
			return $this->nome;
		}	

		public function setNome($nome){
			$this->nome = $nome;
		}

		//get e set cargo
		public function getCargo(){
			return $this->cargo;
		}	

		public function setCargo($cargo){
			$this->cargo = $cargo;
		}	

		//get e set privilegio
		public function getPrivilegio(){
			return $this->privilegio;
		}	

		public function setPrivilegio($privilegio){
			$this->privilegio = $privilegio;
		}	

		public function auth()
		{
			// acessar o banco
			// procurar por ela mesma
			// verificar se o valor de login e senha são iguais

			// $login = "aaa";
			// $senha = "123";
			// if ($this->login == $login && $this->senha == $senha) {
			// 	return true;
			// }else{
			// 	return false;
			// }
			
			$conn = Connection::getInstance();
			$queryAuth = "SELECT * FROM usuarios WHERE login = \"$this->login\" AND senha = \"$this->senha\";";
			$sql = $conn->query($queryAuth);
			$row = $sql->fetch(PDO::FETCH_ASSOC);
			
			return $row;
		}	
	}
?>