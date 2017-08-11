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
		$sql="UPDATE usuario SET nombre=:nombre,apellidos=:apellidos,celular=:celular WHERE correo=:id";
		$resultado=$base->prepare($sql);
		$resultado->execute(array(":nombre"=>$_POST['nome'],":apellidos"=>$_POST['apee'],":celular"=>$_POST['cele'],":id"=>$_POST['core']));
		echo "<script>";
		echo 'window.location = "usuarios.php"';
		echo "</script>"; 

	}
?>
