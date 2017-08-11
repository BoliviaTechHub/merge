<?php 
	
	//importing dbDetails file 
	require_once 'dbDetails.php';	
	//this is our upload folder 
	$upload_path = 'uploads/';
	//Getting the server ip 
	$server_ip = gethostbyname(gethostname());
	//creating the upload url 
	$upload_url = 'http://sistema.acm-sim.org/appG/'.$upload_path; 
	
	//response array 
	$response = array(); 
	$response['error']=0;
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//checking the required parameters from the request 
		if(isset($_POST['email']) and isset($_FILES['image']['name'])){
			//getting name from the request 
			$name = $_POST['email'];
			//connecting to the database 
			$result = $base->prepare("SELECT * FROM usuarios WHERE email=:email");
			$result->execute(array(':email' => $_POST['email']));
    		$user = $result->fetch(PDO::FETCH_ASSOC);

    		$gastos = array("Vivienda", "Deudas", "Entretenimiento", "Comida");
			
			$insertg = $base->prepare("INSERT INTO gastos (nombre,usuario) VALUES (:nombre,:usuario)");
			foreach ($gastos as $gasto) {
    			$insertg->execute(array(':nombre' => $gasto,':usuario' => $user['id']));
			}	

			$insertimg = $base->prepare("UPDATE usuarios SET foto=:foto WHERE id=:usuario");
			//getting file info from the request 
			$fileinfo = pathinfo($_FILES['image']['name']);
			//getting the file extension 
			$extension = $fileinfo['extension'];
			//file url to store in the database 
			$file_url = $upload_url . getFileName($user['id']) . '.' . $extension;
			//file path to upload in the server 
			$file_path = $upload_path . getFileName($user['id']) . '.'. $extension; 
			//trying to save the file in the directory 
			try{
				//saving the file 
				move_uploaded_file($_FILES['image']['tmp_name'],$file_path);
				$insertimg->execute(array(':foto' => $file_url,':usuario' => $user['id']));
				$insertimg->execute(array(':foto' => $file_url,':usuario' => $user['id']));
				//adding the path and name to database 
				$response['error'] = 0; 
			//if some error occurred 
			}catch(Exception $e){
				$response['error']=1;
				$response['message']=$e->getMessage();
			}		
			//displaying the response 
			echo json_encode($response);
			
		}else{
			$response['error']=1;
			$response['message']='Please choose a file';
		}
	}
	
	/*
		We are generating the file name 
		so this method will return a file name for the image to be upload 
	*/
	function getFileName($name){
		
		/*$sql = "SELECT max(id) as id FROM usuarios";
		$result = $base->prepare($sql);
		$result->execute(array());
    	$user = $result->fetch(PDO::FETCH_ASSOC);
		

		mysqli_close($con);
		if($user['id']==null)
			return 1; 
		else 
			return ++$result['id']; 
			*/
			return $name;
	}