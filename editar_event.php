<?php 
	session_start();
	if(!isset($_SESSION["correo"])||$_SESSION["tipo"]<>"A")
	{
		echo "<script>";
		echo 'window.location = "index.php"';
		echo "</script>";
	}
 ?>
<?php 
	if(isset($_POST)){

		include "conexion.php";
		$sql="UPDATE evento SET cupos=:cupos,nombre=:nombre,fecha_ini=:fecha_ini,fecha_fin=:fecha_fin,detalles=:detalles,ubicacion=:ubicacion,costo=:costo WHERE id=:id";
		$resultado=$base->prepare($sql);
		$resultado->execute(array(":cupos"=>$_POST['cuposu'],":nombre"=>$_POST['nomu'],
			":fecha_ini"=>$_POST['finiu'],":fecha_fin"=>$_POST['ffinu'],":detalles"=>$_POST['detu'],":ubicacion"=>$_POST['ubiu'],":costo"=>$_POST['cosu'],":id"=>$_POST['idu']));
		echo "<script>";
		echo 'window.location = "eventos.php"';
		echo "</script>"; 

	}
?>
