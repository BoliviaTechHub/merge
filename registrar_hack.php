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
   	$sql="INSERT INTO hackaton(nombre,foto,fecha_ini,fecha_fin,detalles,ubicacion) VALUES (:nombre,:foto,:fecha_ini,:fecha_fin,:detalles,:ubicacion)";
	$resultado=$base->prepare($sql);
	$resultado->execute(array(":nombre"=>$_POST['nom'],":foto"=>$carpeta_destino.$nombre_foto,":fecha_ini"=>$fini[2]."-".$fini[0]."-".$fini[1]." ".$_POST['hini'].":".$_POST['mini'].":00",":fecha_fin"=>$ffin[2]."-".$ffin[0]."-".$ffin[1]." ".$_POST['hfin'].":".$_POST['mfin'].":00",":detalles"=>$_POST['det'],":ubicacion"=>$_POST['ubi'])); 
	echo "INSERTADO CON EXITO";
	echo '<script type="text/javascript">
           window.location = "hackatones.php"
      	  </script>';
   }

 ?>