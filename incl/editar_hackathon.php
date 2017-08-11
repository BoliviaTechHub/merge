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
		$sql="UPDATE hackaton SET nombre=:nombre,fecha_ini=:fecha_ini,fecha_fin=:fecha_fin,detalles=:detalles,ubicacion=:ubicacion WHERE id=:id";
		$resultado=$base->prepare($sql);
		$resultado->execute(array(":nombre"=>$_POST['nomA'],
			":fecha_ini"=>$_POST['finiA'],":fecha_fin"=>$_POST['ffinA'],":detalles"=>$_POST['detA'],":ubicacion"=>$_POST['ubiA'],":id"=>$_POST['idA']));
		print_r($_POST);
		echo "<script>";
		//echo 'window.location = "hackatones.php"';
		echo "</script>"; 

	}
?>
