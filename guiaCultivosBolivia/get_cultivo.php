<?php 
	
	$json["exitoso"]=0;
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			include "conexion.php";
			$sql="SELECT * FROM cultivo WHERE id=:id";
      $resultado=$base->prepare($sql);
    	$resultado->execute(array(":id"=>$id));
    	$registro=$resultado->fetch(PDO::FETCH_ASSOC);
      $json['exitoso']=1;
    	$json['datos']['nombre']=$registro['nombre'];
      $json['datos']['cuerpo']=$registro['cuerpo'];
      $json['datos']['id']=$id;
      $json['datos']['foto']="http://".substr($registro['foto'],20);
			header('Content-type: text/javascript');
	}
	echo json_encode($json);
 ?>