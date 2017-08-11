<?php 
	if(isset($_GET['correo'])){
		$correo=$_GET['correo'];
		include "conexion.php";
		$sql="SELECT * FROM usuario WHERE correo=:correo";
    	$resultado=$base->prepare($sql);
    	$resultado->execute(array(":correo"=>$correo));
    	$c=$resultado->rowCount();
    	$data = array("regs" =>$c);
		header('Content-type: text/javascript');
		echo json_encode($data);
    } 
?>