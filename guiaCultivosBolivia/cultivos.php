<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Guia de cultivos Bolivia
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
      .vertical-align {
        display: flex;
        align-items: center;
      }

      .ui-dialog-buttonset{
        color: black;
      }
      
      .ui-dialog-titlebar-close{
        background: url("img/ui-icons_222222_256x240.png") repeat scroll -96px -128px rgba(0, 0, 0, 0);
      }
      h3{
        text-transform: uppercase;
      }
     

     

    </style>
</head>
<body>
    <div class="modal fade" id="FormCul" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 align="center">REGISTRO CULTIVO</h1>
        </div>
        <form enctype="multipart/form-data" id="fRegEv" action="registrar_cultivo.php" method="post">
            <div class="form-group row">
                <div class="col-sm-1 col-xs-1"></div>
                <label for="nom" class="col-sm-2 col-xs-2 col-form-label">Nombre</label>
                <div class="col-sm-8 col-xs-8">
                    <input type="text" class="required form-control" id="nom" name="nom" placeholder="Nombre" title="Campo requerido">
                </div>
                <div class="col-sm-1 col-xs-2"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1 col-xs-1"></div>
                <label for="foto" class="col-sm-2 col-xs-2 col-form-label">Foto</label>
                <div class="col-sm-8 col-xs-8">
                	<input name="foto" class="form-control" id="foto" type="file" size="20"/>
                </div>
                <div class="col-sm-1 col-xs-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10" id='dc'>
                </div>
                <div class="col-sm-1"></div>
            </div>

            <div class="form-group row">
                <div class="col-sm-1 col-xs-1"></div>
                <label for="texto" class="col-sm-2 col-form-label col-xs-2">Texto</label>
                <div class="col-sm-8 col-xs-8"> 
                    <textarea rows="10" cols="100" class="required form-control" id="texto" name="texto" title="Debe llenarse">
                    </textarea>
                
                </div>
                <div class="col-sm-1 col-xs-1"></div>
            </div>
             
           <p><input aling="center" class="btn btn-lg btn-danger center-block" type="submit" id="validar" value="REGISTRAR"/></p>
        </form>
       </div> 
     </div>
    </div>


    <div class="modal fade" id="FormCulAct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 align="center">EDITAR CULTIVO</h1>
        </div>
        <form enctype="multipart/form-data" id="fRegEv" action="editar_cultivo.php" method="post">
            <div class="form-group row">
                <div class="col-sm-1 col-xs-1"></div>
                <label for="nomu" class="col-sm-2 col-xs-2 col-form-label">Nombre</label>
                <div class="col-sm-8 col-xs-8">
                    <input type="text" class="required form-control" id="nomu" name="nomu" title="Campo requerido">
                </div>
                <div class="col-sm-1 col-xs-2"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1 col-xs-1"></div>
                <label for="textou" class="col-sm-2 col-form-label col-xs-2">Texto</label>
                <div class="col-sm-8 col-xs-8"> 
                    <textarea rows="10" cols="100" class="required form-control" id="textou" name="textou" title="Debe llenarse">
                    </textarea>
                
                </div>
                <div class="col-sm-1 col-xs-1"></div>
            </div>
            <input type="hidden" id="idu" name="idu" value="0">
           <p><input aling="center" class="btn btn-lg btn-default center-block" type="submit" id="validar" value="ACTUALIZAR"/></p>
        </form>
      </div>
    </div>
   </div>

  
   <?php include "incl/modal_evento_ver_mas.php"; ?>   
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
                        <a href="#about">ACERCA</a>
                    </li>
                    <li class="active">
                        <a href="cultivos.php">CULTIVOS</a>
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
            	<div class="col-md-6 col-xs-6">
            		<H1>CULTIVOS</H1>	
            	</div>
            	<div class="col-md-3 col-xs-1">	
            	</div>
            	<div class="col-md-3 col-xs-5">
            		<br>
                <?php 
                    echo '<a href="" data-toggle="modal" data-target="#FormCul" class="btn btn-primary">CREAR CULTIVO</a>';
                 ?>
            		

            	</div>
            </div>
        </div>
            	<?php 
   								include "conexion.php";
   								$sql="SELECT * FROM cultivo ORDER BY nombre";
    							$resultado=$base->prepare($sql);
    							$resultado->execute(array());
   								while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                        echo "<div class='row vertical-align'>";	
                        echo "<div class='col-md-1 hidden-xs'></div>";
                        echo "<div class='col-md-1 col-xs-12'>";
                        $img="/".substr($registro['foto'],40);
                        echo "<img src='$img' class='img-responsive'>";
                        echo "</div>";
            			echo "<div class='col-md-4 col-xs-6'><h4>".$registro['nombre']."</h4></div>";
                        $idev=$registro['id'];   	
                        $id=$registro['id'];
                        //$id=-1;					
                        echo "<div class='col-md-2 col-xs-4'>".'<a href="" data-toggle="modal" data-target="#FormCulAct" class="btn btn-default ed" data-id="'.$registro['id'].'">EDITAR</a></div>';
            						echo "<div class='col-md-2 col-xs-4'><a class='btn btn-default eli' data-id='".$id."'>ELIMINAR</a></div>";
                        echo "<div class='col-md-2 col-xs-4'>".'<a href="" data-toggle="modal" data-target="#TabEvPar" class="btn btn-default mas" data-id="'.$id.'">VER MAS</a></div>';
                        
                        echo "</div>";
            			}
   							 ?>     
    </section>

        

        

        

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy Guia de cultivos Bolivia</p>
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
    <script src="js/validarRegEv.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>