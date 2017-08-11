<?php 
	function nombremes($mes){
      setlocale(LC_TIME, 'spanish');  
      $nombre=strftime("%B",mktime(0, 0, 0, $mes, 1, 2000)); 
      return $nombre;
  	}
	session_start();
	$json["exitoso"]=0;
	if(isset($_SESSION['correo'])){
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			include "conexion.php";
			$sql="SELECT * FROM hackaton WHERE id=:id";
    		$resultado=$base->prepare($sql);
    		$resultado->execute(array(":id"=>$id));
    		$registro=$resultado->fetch(PDO::FETCH_ASSOC);
        $date1=date_create($registro['fecha_ini']);
    		$date2=date_create($registro['fecha_fin']);
    		$registro['mesini']=nombremes(date_format($date1,'m'));
    		$registro['mesfin']=nombremes(date_format($date2,'m'));
    		$registro['diaini']=date_format($date1,'d');
    		$registro['diafin']=date_format($date2,'d');
    		$registro['horaini']=date_format($date1,'H:i');
    		$registro['horafin']=date_format($date2,'H:i');
    		$json['exitoso']=1;
    		$json['datos']=$registro;
			header('Content-type: text/javascript');
    	}
	}
	echo json_encode($json);
 ?>