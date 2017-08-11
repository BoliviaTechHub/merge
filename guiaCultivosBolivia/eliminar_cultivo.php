<?php 
	
	if(isset($_GET['id'])){
   		include "conexion.php";
		$sql="DELETE FROM cultivo WHERE id=:id";
		$resultado=$base->prepare($sql);
		$resultado->execute(array(":id"=>$_GET['id']));
    }
        echo "<script>";
		echo 'window.location = "cultivos.php"';
		echo "</script>";   
?>