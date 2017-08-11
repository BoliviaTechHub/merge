<?php 
	require_once 'dbDetails.php';
	$response = array(); 
	$response['error']=0;
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['email'])){
			$email = $_POST['email']; 
			$result = $base->prepare("SELECT email FROM usuarios WHERE email=:email");
			$result->execute(array(':email' => $email));
    		$c=$result->rowCount();
    		if($c>0) { 
      			$response['error'] = 1;  
    		}
    			
		}
	}
	header('Content-Type: application/json');
	echo json_encode($response);
?>
	