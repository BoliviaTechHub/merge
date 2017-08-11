<?php 
	session_start();
	$json["exitoso"]=0;
	if(isset($_SESSION['correo'])&&$_SESSION['tipo']=='A'){
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			include "conexion.php";
			$sql="SELECT * FROM equipo WHERE hackaton=:hackaton";
    		$resultado=$base->prepare($sql);
    		$resultado->execute(array(":hackaton"=>$id));
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