<?php 
	require_once 'dbDetails.php';
	$response = array(); 
	$response['error']=0;

	//Tipos de errores 0 todo ok 1 correo no registrado 2 contraseña incorrecta
	//3 no se envio algún campo 4 peticion por GET
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['email'])&&isset($_POST['password'])){
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
    			$result = $base->prepare("SELECT * FROM gastos WHERE usuario=:usuario");
				$result->execute(array(':usuario' => $user['id']));
    			$gastos = $result->fetchAll(PDO::FETCH_ASSOC);
				$response['gastos']=$gastos;
    			
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