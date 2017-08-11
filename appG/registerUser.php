<?php 
	require_once 'dbDetails.php';
	$response = array();
	//Tipo de response 0 todo ok 1 no se envio algun campo 2 correo repetido 3 se conectan por get
	$response['response']=3;
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['name'])&&isset($_POST['lastname'])&&isset($_POST['cel'])&&
			isset($_POST['address'])&&isset($_POST['email'])&&isset($_POST['password'])){
			$email = $_POST['email']; 
			$result = $base->prepare("SELECT email FROM usuarios WHERE email=:email");
			$result->execute(array(':email' => $email));
    		$c=$result->rowCount();
    		if($c>0) { 
      			$response['response'] = 2;  
    		}else{
    			
    			//Registrar
    			$result = $base->prepare("INSERT INTO usuarios(nombre,apellidos,contrasenha,telefono,celular, email,direccion) VALUES (:nom,:ape,:con,:tel,:cel,:ema,:dir)");
				$result->execute(array(':nom' => $_POST['name'],':ape' => $_POST['lastname'],':con' => password_hash($_POST['password'], PASSWORD_DEFAULT),':tel' =>$_POST['phono'],':cel' =>$_POST['cel'],':ema' => $_POST['email'],':dir' => $_POST['address']));
    			$response['response']=0;
    		}		
		}else{
			$response['response'] = 1;
		}
	}
	header('Content-Type: application/json');
	echo json_encode($response);
?>
	