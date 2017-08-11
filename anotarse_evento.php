<?php 
	session_start();
	if(isset($_SESSION['correo'])){
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			include "conexion.php";
			$sql="INSERT INTO registra(evento,usuario,observacion,monto_cancelado) VALUES(:id,:usuario,:observacion,:monto_cancelado)";
    		$resultado=$base->prepare($sql);
    		$resultado->execute(array(":id"=>$id,":usuario"=>$_SESSION['correo'],
    			":observacion"=>"Ninguna",":monto_cancelado"=>0));
    		echo '<script type="text/javascript">
           	window.location = "eventos.php"
      	  	</script>';		
    	}
	}
 ?>