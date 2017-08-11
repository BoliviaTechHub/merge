<?php 
 if(isset($_POST)){
 	include "conexion.php";
  $sql="INSERT INTO proyecto(nombre,descripcion) VALUES (:nom,:des)";
	$resultado=$base->prepare($sql);
	$resultado->execute(array(":nom"=>$_POST['nom'], ":des"=>$_POST['des'])); 
	echo "INSERTADO CON EXITO";
	$e=$base->lastInsertId(); 
   	$sql2="INSERT INTO trabaja(usuario,proyecto) VALUES(:u,:p)";
	foreach ($_POST as $clave=>$valor)
   		{
   		   if($clave<>"nom"&&$clave<>"des"){
   				$resultado2=$base->prepare($sql2);
				$resultado2->execute(array(":u"=>$valor,":p"=>$e));
   		    }
   			
   		}

  	echo '<script type="text/javascript">
           window.location = "proyectos.php"
      	  </script>';

   }
 ?>