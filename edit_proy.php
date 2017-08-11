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
		$sql="UPDATE proyecto SET nombre=:nombre,descripcion=:descripcion WHERE id=:id";
		$resultado=$base->prepare($sql);
		$resultado->execute(array(":nombre"=>$_POST['nomep'],":descripcion"=>$_POST['desep'],":id"=>$_POST['id']));
		echo "<script>";
		echo 'window.location = "proyectos.php"';
		echo "</script>"; 

	}
?>
