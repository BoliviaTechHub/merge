<?php 
	session_start();
	if(!isset($_SESSION["correo"])||$_SESSION["tipo"]<>"A")
	{
		echo "<script>";
		echo 'window.location = "index.php"';
		echo "</script>";
	}
	if(isset($_GET['id'])){
   		include "conexion.php";
		$sql="DELETE FROM hackaton WHERE id=:id";
		$resultado=$base->prepare($sql);
		$resultado->execute(array(":id"=>$_GET['id']));
    }
        echo "<script>";
		echo 'window.location = "hackatones.php"';
		echo "</script>";   
?>