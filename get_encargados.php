
<?php 
	session_start();
	$json["exitoso"]=0;
	if(isset($_SESSION['correo'])&&$_SESSION['tipo']=='A'){
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			include "conexion.php";
			$sql="SELECT proyecto,nombre,apellidos,correo FROM trabaja INNER JOIN usuario ON usuario=correo WHERE proyecto=:id";
    		$resultado=$base->prepare($sql);
    		$resultado->execute(array(":id"=>$id));
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