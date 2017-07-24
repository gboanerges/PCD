<?php 
	
	require_once("../database/Connection.class.php");

	class AdvertenciasController {
		
		private $conn = null;

		function __construct()
		{
			$this->conn = Connection::getInstance();
		}

		public function getAdvertenciaDB(){

			$advertencias = [];
			$conn = Connection::getInstance();
			$query = "SELECT * FROM advertencias;";
			$sql = $conn->query($query);
			while($sql->fetch(PDO::FETCH_ASSOC)){
				array_push($advertencias, $row);

			}
			return $advertencias;
		}

		public function addAdvertenciaDB($motivo, $data, $pontos, $responsavel, $indeferida){
			$conn = Connection::getInstance();
			$queryAdd = "INSERT INTO advertencias (`motivo`, `data`, `pontos`, `responsavel`, `indeferida`) VALUES (\"$motivo\", \"$data\", \"$pontos\", \"$responsavel\", \"$indeferida\");";
			$sql = $conn->query($queryAdd);
			return $sql;
		}
	}
?>