<?php 
	date_default_timezone_set('America/La_Paz');
	require_once 'dbDetails.php';
	$response = array(); 
	$response['error']=0;
	//Tipos de errores 0 todo ok 1 correo no registrado 2 contraseña incorrecta
	//3 no se envio algún campo 4 peticion por GET
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['email'])&&isset($_POST['password'])){
			//Para login
			$email = $_POST['email']; 
			$password=$_POST['password'];
			
			$result = $base->prepare("SELECT id,email,contrasenha FROM usuarios WHERE email=:email");
			$result->execute(array(':email' => $email));
    		$c=$result->rowCount();
    		$user=$result->fetch(PDO::FETCH_ASSOC);
    		if($c==0) { 
      			$response['error'] = 1;  
    		}else if(password_verify($password, $user['contrasenha'])){
    			$response['error']=0;
    			//$response['fecha']=date('Y-m-d H:i:s');
    			$result2 = $base->prepare("SELECT IFNULL(SUM(tmp.monto),0) as T
				FROM (SELECT G.usuario,fecha_hora,monto FROM gastos G INNER JOIN pagos ON G.id=gasto 
				WHERE DATE(fecha_hora)=:fechah AND usuario=:usuario) tmp");
				$result2->execute(array(':fechah'=>date('Y-m-d'),':usuario' => $user['id']));
    			$st=$result2->fetch(PDO::FETCH_ASSOC);
    			$response['total']=$st['T'];
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