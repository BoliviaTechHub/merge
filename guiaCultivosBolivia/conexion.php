<?php  
	  try{
	  	//$base=new PDO('mysql:host=mysql.famafansbolivia.com; dbname=famafans','pgonzales','-xb^dbSz');
	  	$base=new PDO('mysql:host=mysql.acm-sim.org; dbname=sistema_bth','acm_sim_admin','FkT2Fxas');
	  	$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	  	$base->exec("SET CHARACTER SET utf8");
	   }catch(Exception $e){
         die('Error: '.$e->GetMessage());
	   }
	?>