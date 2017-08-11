<?php 
	date_default_timezone_set('America/La_Paz');
	require_once 'dbDetails.php';
	$response = array(); 
	$response['error']=0;
	//Tipos de errores 0 todo ok 1 correo no registrado 2 contraseña incorrecta
	//3 no se envio algún campo 4 peticion por GET
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['monto'])&&isset($_POST['nombre'])&&isset($_POST['idgast'])&&isset($_POST['email'])&&isset($_POST['password'])){
			//Para login
			$email = $_POST['email']; 
			$password=$_POST['password'];
			//Para registrar un pago
			$monto=$_POST['monto'];
			$nombre=$_POST['nombre'];
			$idgasto=$_POST['idgast'];

			$result = $base->prepare("SELECT id,email,contrasenha FROM usuarios WHERE email=:email");
			$result->execute(array(':email' => $email));
    		$c=$result->rowCount();
    		$user=$result->fetch(PDO::FETCH_ASSOC);
    		if($c==0) { 
      			$response['error'] = 1;  
    		}else if(password_verify($password, $user['contrasenha'])){
    			$response['error']=0;
    			$result = $base->prepare("INSERT INTO pagos (fecha_hora,gasto,nombre,monto) VALUES (:fh,:gast,:nomb,:mont)");
				$result->execute(array(':fh'=>date('Y-m-d H:i:s'),':gast' => $idgasto,':nomb'=>$nombre,':mont'=>$monto));
    			
    		}else{
    			$response['error']=2;
    		}		
		}else{
			$response['error']=3;
		}
	}else{
		$response['error']=4;
	}	

	
	header('Content-Type: application/json');
	echo json_encode($response);
?>