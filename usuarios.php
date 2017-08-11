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
        .b{
            margin-left: 0;
            float: left;   
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
    <div class="modal fade" id="FormReg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 align="center">REGISTRO</h1>
        </div>
        <form id="fReg" action="registrar_part.php" method="post">
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
                <label for="nom" class="col-sm-2 col-form-label">Apellidos</label>
                <div class="col-sm-8">
                    <input type="text" class="required form-control" id="ape" name="ape" placeholder="Apellidos" title="Campo requerido">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="cor" class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-8">
                    <input type="text" class="required email form-control" id="cor" name="cor" placeholder="uncorreo@gmail.com" title="Correo inválido">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="con" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-8">
                    <input type="password" class="required form-control" id="con" name="con" placeholder="Contraseña" autocomplete="new-password" title="Campo requerido">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="con" class="col-sm-2 col-form-label">Celular</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="cel" name="cel" autocomplete="new-password" class="number"
                    title="Debes introducir un número">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <p><input aling="center" class="btn btn-lg btn-default center-block" type="submit" id="validar" value="REGISTRARSE"/></p>
        </form>

       </div> 
     </div>
    </div>

    <div class="modal fade" id="FormLog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 align="center">AUTENTICACIÓN</h1>
        </div>
        <form id="fLog" action="comprueba_login.php" method="post">
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="cor_log" class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-8">
                    <input type="text" class="required email form-control" id="cor_log" name="cor_log" placeholder="Correo" title="Correo inválido">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="con_log" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-8">
                    <input type="password" class="required form-control" id="con_log" name="con_log" placeholder="Contraseña" title="Campo requerido" autocomplete="new-password">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <p><input aling="center" class="btn btn-lg btn-default center-block" type="submit" id="validar" value="ENTRAR"/></p>
        </form>

       </div> 
     </div>
    </div>
    <?php include "incl/modal_editar_usuario.php"; ?>
    <?php include "incl/modal_confirmacion.php";?>
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
                   
                    <li class="active">
   						 <a href="usuarios.php">PARTICIPANTES</a>
					</li>
					<li>
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
    <br>
    <div class="container">
       <div class="row">
        
        <form action="usuarios.php" method="get">
                
                <div class="col-sm-6">
                    <input type="text" class="b form-control" id="valor" name="valor" placeholder="Nombre, apellidos o correo a buscar">
                </div>
                <div class="col-sm-1"><input class="btn btn-primary" type="submit" id="validar" value="BUSCAR"/></div>
                <div class="col-sm-1"></div>
            
        </form>
       </div>
    </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  	<div class="table-responsive">
  						<table class="table">
   							<thead id="thead-tabla">
   								<tr>
    								<td>NOMBRE</td>
    								<td>APELLIDOS</td>
    								<td>CORREO</td>
    								<td>EDITAR</td>
    								<td>ELIMINAR</td>
    								<td>HACKATONES Y/O EVENTOS</td>
  								</tr>
   							</thead>
   							<tbody>
   							<?php 
                                if(isset($_GET['valor']))
                                {
                                    $valor=$_GET['valor'];
                                }else{
                                    $valor="";
                                }
   								include "conexion.php";
   								$sql="SELECT * FROM usuario WHERE (nombre LIKE :nombre OR apellidos LIKE :apellidos OR correo LIKE :correo) AND tipo<>'A' ORDER BY nombre";
    							$resultado=$base->prepare($sql);
    							$resultado->execute(array(":nombre"=>'%'.$valor.'%',":apellidos"=>'%'.$valor.'%',":correo"=>'%'.$valor.'%'));
   								while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            						echo "<tr>";
            						echo "<td>".$registro["nombre"]."</td>";
            						echo "<td>".$registro["apellidos"]."</td>";
            						echo "<td>".$registro["correo"]."</td>";
            						echo "<td><a href='#' data-toggle='modal' data-target='#FEdUs' class='btn btn-default ed' data-id='".$registro["correo"]."'>"."EDITAR"."</td>";
            						echo "<td><a class='eli btn btn-default' data-id='".$registro['correo']."'> ELIMINAR"."</td>";
            						echo "<td><a class='btn btn-default' href='hack-eve.php?correo=".$registro['correo']."'>"."VER"."</a></td>";

            						echo "</tr>";
            					}
   							 ?>
  								
							</tbody>
  						</table>
					</div>              
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

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.min.js"></script>
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