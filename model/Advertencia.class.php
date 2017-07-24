<?php 

	
	/**
	* 
	*/
	class Advertencia {

		public $motivo=null;
		public $data=null;
		public $pontos=null;
		public $responsavel=null;
		public $indeferida=null;

		function __construct($motivo, $data, $pontos, $responsavel, $indeferida){		

			$this->motivo = $motivo;
			$this->data = $data;
			$this->pontos = $pontos;
			$this->responsavel = $responsavel;
			$this->indeferida = $indeferida;
		}

		//get e set motivo
		public function getMotivo(){
			return $this->motivo;
		}	

		public function setMotivo($motivo){
			$this->motivo = $motivo;
		}

		//get e set data
		public function getData(){
			return $this->data;
		}	

		public function setData($data){
			$this->data = $data;
		}

		//get e set pontos
		public function getPontos(){
			return $this->pontos;
		}	

		public function setPontos($pontos){
			$this->pontos = $pontos;
		}

		//get e set responsavel
		public function getResponsavel(){
			return $this->responsavel;
		}	

		public function setResponsavel($responsavel){
			$this->responsavel = $responsavel;
		}

		//get e set indeferida
		public function getIndeferida(){
			return $this->indeferida;
		}	

		public function setIndeferida($indeferida){
			$this->indeferida = $indeferida;
		}

		public function addAdvertencia(){
			$conn = Connection::getInstance();
			$queryAdd = "INSERT INTO advertencias (`motivo`, `data`, `pontos`, `responsavel`, `indeferida`) VALUES (\"$this->motivo\", \"$this->data\", \"$this->pontos\", \"$this->responsavel\", \"$this->indeferida\");";
			$sql = $conn->query($queryAdd);
			return $sql;
		}

	}
	
?>