<?php 
require_once '../database/Connection.class.php';
	
	
	$conn = Connection::getInstance();
	$query = "SELECT * FROM usuarios";
	$sql = $conn->query($query);
	var_dump($sql);

?>