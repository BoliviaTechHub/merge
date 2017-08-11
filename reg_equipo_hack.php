<?php 
   if(isset($_POST)){
   	//print_r($_POST);
 	include "conexion.php";
   	$sql="INSERT INTO equipo(nombre,resultados,hackaton) VALUES (:nombre,:resultados,:hackaton)";
   	$resultado=$base->prepare($sql);
   	$resultado->execute(array(":nombre"=>$_POST['nomeq'],":resultados"=>'Sin resultados todavia',":hackaton"=>$_POST['h']));
   	$e=$base->lastInsertId(); 

   	$sql2="INSERT INTO pertenece(participante,equipo) VALUES(:p,:e)";
	foreach ($_POST as $clave=>$valor)
   		{
   		   if($clave<>"h"&&$clave<>"nomeq"&&$clave<>"cp"){
   				if($valor<>"Sin resultados todavia"){
   					$resultado2=$base->prepare($sql2);
					$resultado2->execute(array(":p"=>$valor,":e"=>$e));
   		    	}
   			}
   			
   		}
   	echo '<script type="text/javascript">
          window.location = "hackatones.php"
      	  </script>';
   }
 ?>
 