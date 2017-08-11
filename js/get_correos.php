<?php 
	session_start();
	$json["exitoso"]=0;
	if(isset($_SESSION['correo'])){
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			include "conexion.php";
			$sql="SELECT correo FROM usuario WHERE correo NOT IN(SELECT participante FROM pertenece INNER JOIN equipo ON equipo=id WHERE hackaton=:hackaton)";

      	$resultado=$base->prepare($sql);
    		$resultado->execute(array(":hackaton"=>$id));
    		$datos=array();
        $i=0;
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