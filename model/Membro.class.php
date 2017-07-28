<?php 

require_once '../database/Connection.class.php';
	
	class Membro
	{	
		public $id = null;
		public $login=null;
		public $senha=null;
		public $nome=null;
		public $cargo=null;
		public $foto = null;

		function __construct($login, $senha, $nome, $cargo){
			$this->login = $login;
			$this->senha = $senha;
			$this->nome = $nome;		
			$this->cargo = $cargo;		
						
		}

		//get e set Id
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

		//get e set Foto
		public function getFoto(){
			return $this->foto;
		}	

		public function setFoto($foto){
			$this->foto = $foto;
		}
	
	}
?>