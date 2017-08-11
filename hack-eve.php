<?php session_start();
	function nombremes($mes){
      setlocale(LC_TIME, 'spanish');  
      $nombre=strftime("%B",mktime(0, 0, 0, $mes, 1, 2000)); 
      return $nombre;
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bolivia Tech Hub
    </title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    	.vertical-align {
        	display: flex;
        	align-items: center;
      	}
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">MENÚ</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <a href="index.php">INICIO</a>
                    </li>
                    <li>
                        <a href="index.php#about">ACERCA</a>
                    </li>
                    <li>
                        <a href="index.php#service">SERVICIOS</a>
                    </li>
                     <li>
                        <a href="index.php#portfolio">GALERIA</a>
                    </li>
                    <li>
                        <a href="eventos.php">EVENTOS</a>
                    </li>
                    <li>
                        <a href="hackatones.php">HACKATONES</a>
                    </li>
                    <?php 
                        if(isset($_SESSION["correo"])){
                            if($_SESSION["tipo"]=="P"){
                                echo "<li class='active'>";
                                echo "<a href='hack-eve.php'>HISTORIAL</a>";
                                echo "</li>";
                                echo "<li>";
                                echo     "<a href='logout.php'>LOGOUT</a>";
                                echo "</li>";
                                echo "</ul>";
                            }else if($_SESSION["tipo"]=="A"){
                                include "incl/menu_login_a.php";
                            }
                        }else{
                            echo "<script>";
                                echo 'window.location = "proyectos.php"';
                            echo "</script>";    
                        } 
                    ?>
                    
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <section>
    <div class="row">
        <div class="col-md-1">	
        </div>
        <div class="col-md-11">
            <H1>HACKATONES</H1>	
        </div>
    </div>
    </section>
    <section>
        <?php 
        	$us;
    		if($_SESSION['tipo']=='P'){
    			$us=$_SESSION['correo'];
    		}else{
    			$us=$_GET['correo'];
    		}
    		include "conexion.php";
                  $sql="SELECT e.nombre as equipo,e.resultados,h.nombre as hackaton,h.fecha_ini,h.fecha_fin,h.ubicacion
					    FROM pertenece p,equipo e,hackaton h
						WHERE p.equipo=e.id AND e.hackaton=h.id AND p.participante=:us ORDER BY h.fecha_ini DESC";
                  $resultado=$base->prepare($sql);
                  $resultado->execute(array(":us"=>$us));
                  while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                        echo "<div class='row vertical-align'>";
                        $date = date_create($registro["fecha_ini"]);
                        $date2 = date_create($registro["fecha_fin"]);
                        echo "<div class='col-md-1'></div>";
                        echo "<div class='col-md-3'><h4>".$registro["hackaton"]."</h4><h5>Del ".date_format($date,'d')." de ".nombremes(date_format($date,'m'))." al ".date_format($date2,'d')." de ".nombremes(date_format($date2,'m'))."<h5></div>";
                        echo "<div class='col-md-2'><h4>".$registro['ubicacion']."</h4></div>";
                        echo "<div class='col-md-2'><h4>".$registro['equipo']."</h4></div>";
                        echo "<div class='col-md-3'><h4>".$registro['resultados']."</h4></div>";
                        echo "</div>";
                  }
    	?>          
    </section>
    <section>
    <div class="row">
        <div class="col-md-1">	
        </div>
        <div class="col-md-11">
            <H1>EVENTOS</H1>	
        </div>
    </div>
    </section>
    <section>
<?php 
   		include "conexion.php";
   		$sql="SELECT e.nombre,e.fecha_ini,e.fecha_fin,e.ubicacion 
   			  FROM evento e INNER JOIN registra r ON e.id=r.evento
				WHERE r.usuario=:us ORDER BY e.fecha_ini";
    	$resultado=$base->prepare($sql);
    	$resultado->execute(array(":us"=>$us));
   				while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                        echo "<div class='row vertical-align'>";
            						$date = date_create($registro["fecha_ini"]);
                        $date2 = date_create($registro["fecha_fin"]);
                        echo "<div class='col-md-1'></div>";
                        echo "<div class='col-md-1'>";
                        echo "<h3>".date_format($date,'d')."</h3><h4>".nombremes(date_format($date,'m'))."</h4>";
                        echo "</div>";
            						echo "<div class='col-md-4'><h4>".$registro["nombre"]."</h4><h5>Del ".date_format($date,'d')." de ".nombremes(date_format($date,'m'))." al ".date_format($date2,'d')." de ".nombremes(date_format($date2,'m'))."<h5></div>";
                        echo "</div>";
            	}
   		?>
   		</section>
<!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Bolivia Tech Hub 2017</p>
            </div>
        </div>
    </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jqueryVal.js"></script>
    <script src="js/validarReg.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
