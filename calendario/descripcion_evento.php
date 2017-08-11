<?php

    //incluimos nuestro archivo config
    include 'config.php'; 

    // Incluimos nuestro archivo de funciones
    include 'funciones.php';

    // Obtenemos el id del evento
    $id  = evaluar($_GET['id']);

    // y lo buscamos en la base de dato
    $bd  = $conexion->query("SELECT * FROM evento WHERE id=$id");

    // Obtenemos los datos
    $row = $bd->fetch_assoc();

    // titulo 
    $titulo=$row['nombre'];

    // cuerpo
    $evento=$row['detalles'];

    // Fecha inicio
    $inicio=$row['fecha_ini'];

    // Fecha Termino
    $final=$row['fecha_fin'];

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$titulo?></title>
</head>
<body>
	 <h3><?=$titulo?></h3>
	 <hr>
     <b>Fecha inicio:</b> <?=$inicio?>
     <b>Fecha termino:</b> <?=$final?>
 	<p><?=$evento?></p>
</body>

</html>
