<?php 
	session_start();
	$json["exitoso"]=0;
	if(isset($_SESSION['correo'])&&$_SESSION['tipo']=='A'){
		if(isset($_GET['nombre'])){
			$nom=$_GET['nombre'];
			include "conexion.php";
			$sql="SELECT * FROM usuario WHERE (nombre LIKE :nombre OR apellidos LIKE :apellidos OR correo LIKE :correo) AND tipo<>'A' ORDER BY nombre";
    		$resultado=$base->prepare($sql);
    		$resultado->execute(array(":nombre"=>'%'.$nom.'%',":apellidos"=>'%'.$nom.'%',":correo"=>'%'.$nom.'%'));
    		$i=0;
    		$datos=array();
			while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
    		{
        		$datos[$i] = $registro;
        		$i++;
    		}
    		$json['exitoso']=1;
    		$json['datos']=$datos;
			header('Content-type: text/javascript');
    	}
	}
	echo json_encode($json);
 ?>