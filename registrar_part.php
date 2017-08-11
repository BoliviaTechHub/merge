<?php 
 if(isset($_POST)){
 	include "conexion.php";
   	$sql="INSERT INTO usuario(correo,apellidos,nombre,contrasenia,celular,tipo) VALUES (:correo,:apellidos,:nombre,:contrasenia,:celular,:tipo)";
	$resultado=$base->prepare($sql);
	$resultado->execute(array(":correo"=>$_POST['cor'], ":apellidos"=>$_POST['ape'], ":nombre"=>$_POST['nom'], ":contrasenia"=>password_hash($_POST['con'],PASSWORD_DEFAULT,array("cost"=>12)), ":celular"=>$_POST['cel'], ":tipo"=>"P")); 
	  session_start();
    $_SESSION["correo"]=$_POST["cor"];
    $_SESSION["tipo"]="P";
    echo '<script type="text/javascript">
           window.location = "index.php"
      	  </script>';
   }
 ?>