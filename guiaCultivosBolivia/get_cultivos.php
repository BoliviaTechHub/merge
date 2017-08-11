<?php 
        include "conexion.php";
        $sql="SELECT * FROM cultivo ORDER BY nombre";
        $resultado=$base->prepare($sql);
        $resultado->execute(array());
        $i=0;
        $json=array();
        while($row=$resultado->fetch(PDO::FETCH_ASSOC))
        {
          $row['foto']="http://".substr($row['foto'],20);
          $json[$i] = $row;
          $i++;
        }
      header('Content-type: text/javascript');
      echo json_encode($json);
 ?>