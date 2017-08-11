<?php 
   if(isset($_POST)){
 	include "conexion.php";
   	$sql="UPDATE equipo SET resultados=:resultados WHERE hackaton=:hackaton";
	$resultado=$base->prepare($sql);
	$resultado->execute(array(":resultados"=>'Participaste',":hackaton"=>$_POST['hack']));
	$sql2="UPDATE equipo SET resultados=:resultados WHERE id=:id AND hackaton=:hackaton";
	foreach ($_POST as $clave=>$valor)
   		{
   			if($clave<>"hack"&&$clave<>"cEq"){
   				if($valor<>"Sin resultados todavia"){
   					$resultado2=$base->prepare($sql2);
   					$id=substr($clave,1);
   					echo "$id<br>";
   		    		$resultado2->execute(array(":resultados"=>$valor,":id"=>$id,":hackaton"=>$_POST['hack']));	
   		    	}
   			}
   			
   		}
		echo '<script type="text/javascript">
          window.location = "hackatones.php"
      	  </script>';
   }

 ?>