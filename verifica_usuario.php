<?php
	include "conexion.php";
	$correo=htmlentities(addslashes($_GET["correo"]));
	$pass=htmlentities(addslashes($_GET["contra"]));
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$contador=0;
	$sql="SELECT * FROM usuario WHERE correo=:correo";
	$resultado=$base->prepare($sql);	
	$resultado->execute(array(":correo"=>$correo));
	while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){			
		if(password_verify($pass,$registro['contrasenia'])){
			$contador++;
			session_start();
			$_SESSION["correo"]=$registro['correo'];
			$_SESSION["tipo"]=$registro['tipo'];
			break;
		}	
	}
	$resultado->closeCursor();
	if($contador==1){
		$regcod["exitoso"]=1;
		echo json_encode($regcod);
	}else{
		$regcod["exitoso"]=0;
		echo json_encode($regcod);
	}
		

?>