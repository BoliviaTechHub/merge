<?php
// Incluimos nuestro archivo config
include 'config.php'; 

// Sentencia sql para traer los eventos desde la base de datos
$sql="SELECT * FROM evento"; 

// Verificamos si existe un dato
if ($conexion->query($sql)->num_rows)
{ 
    // creamos un array
    $datos = array(); 
    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0; 
    // Ejecutamos nuestra sentencia sql
    $e = $conexion->query($sql); 
    while($row=$e->fetch_assoc()) // realizamos un ciclo while para traer los eventos encontrados en la base de dato
    {
        // Alimentamos el array con los datos de los eventos
        $row2['url']="http://127.0.0.1/sistema_bth/calendario/descripcion_evento.php?id=".$row['id'];
        $row2['class']="event-info";
        $row2['title']=$row['nombre'];
        $row2['body']=$row['detalles'];
        $row2['id']=$row['id'];
        //$row2['start']=1491329160000;
        $row2['start']=strtotime($row['fecha_ini'])*1000;
        $row2['end']=strtotime($row['fecha_fin'])*1000;
        $datos[$i] = $row2; 
        
        
        
        $i++;
    }
    // Transformamos los datos encontrado en la BD al formato JSON
        echo json_encode(
                array(
                    "success" => 1,
                    "result" => $datos
                )
            );

    }
    else
    {
        // Si no existen eventos mostramos este mensaje.
        echo "No hay datos"; 
    }


?>
