<?php   
 
 define('HOST','mysql.acm-sim.org');
 define('USER','acm_sim_admin');
 define('PASS','FkT2Fxas');
 define('DB','sistema_bth');
 
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('unable to connect to db');

	  /*try{
	  	$base=new PDO('mysql:host=mysql.acm-sim.org; dbname=sistema_bth','acm_sim_admin','FkT2Fxas');
	  	$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	  	$base->exec("SET CHARACTER SET utf8");
	   }catch(Exception $e){
         die('Error: '.$e->GetMessage());
	   }*/
	?>