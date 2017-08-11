<?php 
  if(isset($_POST)){
  	$nombre_foto=$_FILES['foto']['name'];
  	$tipo_foto=$_FILES['foto']['type'];
  	$tamano_foto=$_FILES['foto']['size'];

  	$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/imagenes/';
  	move_uploaded_file($_FILES['foto']['tmp_name'],$carpeta_destino.$nombre_foto);
  	echo $carpeta_destino.$nombre_foto;
 	$fini=explode('/', $_POST['fini']);
 	$ffin=explode('/', $_POST['ffin']);
 	include "conexion.php";
   	$sql="INSERT INTO cultivo(nombre,foto,cuerpo) VALUES (:nombre,:foto,:texto)";
	$resultado=$base->prepare($sql);
	$resultado->execute(array(":nombre"=>$_POST['nom'],":foto"=>$carpeta_destino.$nombre_foto,":texto"=>$_POST['texto'])); 
	echo "INSERTADO CON EXITO";
	echo '<script type="text/javascript">
           window.location = "cultivos.php"
      	  </script>';
   }

 ?>