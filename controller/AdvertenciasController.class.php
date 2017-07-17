<?php 
	
	require_once("../database/Connection.class.php");

	class AdvertenvenciasController {
		
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
	}
?>