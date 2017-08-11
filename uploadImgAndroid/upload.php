<?php
 	if($_SERVER['REQUEST_METHOD']=='POST'){
 		$image= $_POST['foto'];
        $name = $_POST['nombre'];
 		require_once('dbConnect.php');
 		$sql ="SELECT id FROM frutas ORDER BY id ASC";
 		$res = mysqli_query($con,$sql);
		$id = 0;
 		while($row = mysqli_fetch_array($res)){
 			$id = $row['id'];
 		}
 		$path = "uploads/$id.png";
 		$actualpath = "http://sistema.acm-sim.org/uploadImgAndroid/$path";
 		$sql = "INSERT INTO frutas (foto,nombre) VALUES ('$actualpath','$name')";
 		if(mysqli_query($con,$sql)){
 			file_put_contents($path,base64_decode($image));
 			echo "Successfully Uploaded";
 		}
 		mysqli_close($con);
 		}else{
 			echo "Error";
 		}




 /*if($_SERVER['REQUEST_METHOD']=='POST'){
 	$imagen= $_POST['foto'];
 	$nombre = $_POST['nombre'];
 	require_once('dbConnect.php');
 	$id=$base->lastInsertId()+1;
 	$path = "uploads/$id.png";
 	$actualpath = "http://sistema.acm-sim.org/uploadImgAndroid/$path";
 	$result = $base->prepare("INSERT INTO frutas (foto,nombre) VALUES (?,?)");
 	if($result->execute([$actualpath,$nombre])){
 		file_put_contents($path,base64_decode($imagen));
 		echo "Subio imagen Correctamente";
 	}
}else{
 	echo "Error";
}/*
