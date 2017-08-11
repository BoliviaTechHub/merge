<?php 
	session_start();
	if(!isset($_SESSION["correo"])||$_SESSION["tipo"]<>"A")
	{
		echo "<script>";
		echo 'window.location = "index.php"';
		echo "</script>";
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
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <style type="text/css">
    	#thead-tabla{
    		font-weight: bold;
    	}
    	#det{
    		min-width: 100%;
    		max-width: 100%;
    		min-height: 50px;
    		max-height: 1000px;
    	}
      .l{
        float:left;
      }
      .r{
        float: right;
      }
      .vertical-align{
        display: flex;
        align-items: center;
      }
      table{
        margin-left:auto; 
        margin-right:auto;
      }
      .ui-dialog-buttonset{
        color: black;
      }
      .ui-dialog-titlebar-close{
        background: url("img/ui-icons_222222_256x240.png") repeat scroll -96px -128px rgba(0, 0, 0, 0);
      }
    </style>
</head>
<body>
    <div class="modal fade" id="FormEv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 class="l">PROYECTO</h1><h1><a class="r btn btn-primary" id="ap" href="">AGREGAR ENCARGADO</a></h1>
        </div>
        <form enctype="multipart/form-data" id="fRegProy" action="registrar_proy.php" method="post">
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="nom" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-8">
                    <input type="text" class="required form-control" id="nom" name="nom" placeholder="Nombre" title="Campo requerido">
                </div>
                <div class="col-sm-1"></div>
            </div>
             <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="det" class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="des" name="des" placeholder="Detalles" title="Campo requerido">
                    </textarea>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <p id="appnd">
            </p>
             
           <p><input class="btn btn-lg btn-default center-block" type="submit" id="validar" value="REGISTRARSE"/></p>
        </form>

       </div> 
     </div>
    </div>
    <?php include "incl/modal_editar_proy.php"; ?>
    <?php include "incl/modal_encargados.php"; ?>
    <?php include "incl/modal_confirmacion.php"; ?>
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
                    <li>
   						 <a href="usuarios.php">PARTICIPANTES</a>
					</li>
					<li class="active">
    					<a href="proyectos.php">PROYECTOS</a>
					</li>
					<li>
    					<a href="logout.php">LOGOUT</a>
					</li>
				</ul>
                    
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <section>
        <div class="container">
            <div class="row">
            	<div class="col-md-6">
            		<H1>PROYECTOS</H1>	
            	</div>
            	<div class="col-md-3">	
            	</div>
            	<div class="col-md-3">
            		<br>
            		<a href="" data-toggle="modal" data-target="#FormEv" class="btn btn-default">CREAR PROYECTO</a>	
            	</div>
            	
                <div class="col-md-12">
   							<?php 
   								include "conexion.php";
   								$sql="SELECT * FROM proyecto";
    							$resultado=$base->prepare($sql);
    							$resultado->execute(array());
   								while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                        echo "<div class='row  vertical-align'>";
                        echo "<div class='col-md-4'>";
            						echo "<h2>".$registro["nombre"]."</h2>";
            						
                        echo "</div>";
                        echo "<div class='col-md-3'>";
                        echo "<p>".$registro["descripcion"]."</p>";
                        echo "</div>";
                        echo "<div class='col-md-1'>";
                        echo "<a data-toggle='modal' data-target='#FormEP' class='btn btn-primary edi' "."data-id='".$registro['id']."'>".'Editar'."</a></p>";
                        echo "</div>";
                        echo "<div class='col-md-2'>";
                        $id=$registro['id'];
                        echo "<a href='' class='btn btn-primary eli' "."data-id='".$registro['id']."'>".' Eliminar '."</a></p>";
                        echo "</div>";
                        echo "<div class='col-md-2'>";
                        echo "<a data-toggle='modal' data-target='#TabEnc'  class='btn btn-primary mos' "."data-id='".$registro['id']."'>".'Encargados'."</a></p>";
                        echo "</div>";
                        echo "</div>";
                        
            			}
   							 ?>      
                 </div>
            </div>
        </div>
        
    </section>

        

        

        

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Bolivia Tech Hub 2017</p>
                </div>
            </div>
        </footer>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jqueryVal.js"></script>
    <script src="js/validarRegProy.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>