<?php 
	if(isset($_POST)){
		//print_r($_POST);
		include "conexion.php";
		$sql="UPDATE cultivo SET nombre=:nombre,cuerpo=:cuerpo WHERE id=:id";
		$resultado=$base->prepare($sql);
		$resultado->execute(array(":nombre"=>$_POST['nomu'],":cuerpo"=>$_POST['textou'],":id"=>$_POST['idu']));
		echo "<script>";
		echo 'window.location = "cultivos.php"';
		echo "</script>"; 

	}
?>
