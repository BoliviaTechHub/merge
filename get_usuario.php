<?php 
	session_start();
	$json["exitoso"]=0;
	if(isset($_SESSION['correo'])&&$_SESSION['tipo']=='A'){
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			include "conexion.php";
			$sql="SELECT * FROM usuario WHERE correo=:id";
    		$resultado=$base->prepare($sql);
    		$resultado->execute(array(":id"=>$id));
    		$registro=$resultado->fetch(PDO::FETCH_ASSOC);
    		$json['exitoso']=1;
    		$json['datos']=$registro;
			header('Content-type: text/javascript');
    	}
	}
	echo json_encode($json);
 ?>