<?php 
	session_start();
	if(!isset($_SESSION["correo"]))
	{
		echo "<script>";
		echo 'window.location = "index.php"';
		echo "</script>";
	}
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

     

    </style>
</head>
<body>
    <div class="modal fade" id="FormEv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 align="center">REGISTRO EVENTO</h1>
        </div>
        <form enctype="multipart/form-data" id="fRegEv" action="registrar_event.php" method="post">
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
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-8">
                	<input name="foto" class="form-control" id="foto" type="file" size="20"/>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10" id='dc'>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="cupos" class="col-sm-2 col-form-label">Cupos</label>
                <div class="col-sm-8">
                    <input type="text" class="required number form-control" id="cupos" name="cupos" placeholder="Cupos" title="Debe ser un número">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="ubi" class="col-sm-2 col-form-label">Ubicación</label>
                <div class="col-sm-8">
                    <input type="text" class="required form-control" id="ubi" name="ubi" placeholder="Ubicación" title="Campo requerido">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="det" class="col-sm-2 col-form-label">Detalles</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="det" name="det" placeholder="Detalles" title="Campo requerido">
                    </textarea>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="cos" class="col-sm-2 col-form-label">Costo</label>
                <div class="col-sm-8">
                    <input type="text" class="required number form-control" id="cos" name="cos" placeholder="Costo" title="Debe ser un número">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="fini" class="col-sm-2 col-form-label">Inicio</label>
                <div class="col-sm-4">
                    <input type="text" class="required date form-control" id="fini" name="fini" placeholder="MM/DD/AAAA" title="Debe ser fecha MM/DD/AAAA">
                </div>
                <div class="col-sm-4">
                   <select name="hini">
                   	<option value="00">00</option>
                   	<option value="01">01</option>
                   	<option value="02">02</option>
                   	<option value="03">03</option>
                   	<option value="04">04</option>
                   	<option value="05">05</option>
                   	<option value="06">06</option>
                   	<option value="07">07</option>
                   	<option value="08">08</option>
                   	<option value="09">09</option>
                   	<option value="10">10</option>
                   	<option value="11">11</option>
                   	<option value="12">12</option>
                   	<option value="13">13</option>
                   	<option value="14">14</option>
                   	<option value="15">15</option>
                   	<option value="16">16</option>
                   	<option value="17">17</option>
                   	<option value="18">18</option>
                   	<option value="19">19</option>
                   	<option value="20">20</option>
                   	<option value="21">21</option>
                   	<option value="22">22</option>
                   	<option value="23">23</option>
                   </select> :
                   <select name="mini">
                    <option value="00">00</option>
                    <option value="01">01</option>
                   	<option value="02">02</option>
                   	<option value="03">03</option>
                   	<option value="04">04</option>
                   	<option value="05">05</option>
                   	<option value="06">06</option>
                   	<option value="07">07</option>
                   	<option value="08">08</option>
                   	<option value="09">09</option>
                   	<option value="10">10</option>
                   	<option value="11">11</option>
                   	<option value="12">12</option>
                   	<option value="13">13</option>
                   	<option value="14">14</option>
                   	<option value="15">15</option>
                   	<option value="16">16</option>
                   	<option value="17">17</option>
                   	<option value="18">18</option>
                   	<option value="19">19</option>
                   	<option value="20">20</option>
                   	<option value="21">21</option>
                   	<option value="22">22</option>
                   	<option value="23">23</option>
                   	<option value="24">24</option>
                   	<option value="25">25</option>
                   	<option value="26">26</option>
                   	<option value="27">27</option>
                   	<option value="28">28</option>
                   	<option value="29">29</option>
                   	<option value="30">30</option>
                   	<option value="31">31</option>
                   	<option value="32">32</option>
                   	<option value="33">33</option>
                   	<option value="34">34</option>
                   	<option value="35">35</option>
                   	<option value="36">36</option>
                   	<option value="37">37</option>
                   	<option value="38">38</option>
                   	<option value="39">39</option>
                   	<option value="40">40</option>
                   	<option value="41">41</option>
                   	<option value="42">42</option>
                   	<option value="43">43</option>
                   	<option value="44">44</option>
                   	<option value="45">45</option>
                   	<option value="46">46</option>
                   	<option value="47">47</option>
                   	<option value="48">48</option>
                   	<option value="49">49</option>
                   	<option value="50">50</option>
                   	<option value="51">51</option>
                   	<option value="52">52</option>
                   	<option value="53">53</option>
                   	<option value="54">54</option>
                   	<option value="55">55</option>
                   	<option value="56">56</option>
                   	<option value="57">57</option>
                   	<option value="58">58</option>
                   	<option value="59">59</option>
                   </select> 
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="ffin" class="col-sm-2 col-form-label">Fin</label>
                <div class="col-sm-4">
                    <input type="text" class="required date form-control" id="ffin" name="ffin" placeholder="MM/DD/AAAA" title="Debe ser fecha MM/DD/AAAA">
                </div>
                <div class="col-sm-4">
                	<select name="hfin">
                   	<option value="00">00</option>
                   	<option value="01">01</option>
                   	<option value="02">02</option>
                   	<option value="03">03</option>
                   	<option value="04">04</option>
                   	<option value="05">05</option>
                   	<option value="06">06</option>
                   	<option value="07">07</option>
                   	<option value="08">08</option>
                   	<option value="09">09</option>
                   	<option value="10">10</option>
                   	<option value="11">11</option>
                   	<option value="12">12</option>
                   	<option value="13">13</option>
                   	<option value="14">14</option>
                   	<option value="15">15</option>
                   	<option value="16">16</option>
                   	<option value="17">17</option>
                   	<option value="18">18</option>
                   	<option value="19">19</option>
                   	<option value="20">20</option>
                   	<option value="21">21</option>
                   	<option value="22">22</option>
                   	<option value="23">23</option>
                   </select> :
                   <select name="mfin">
                    <option value="00">00</option>
                    <option value="01">01</option>
                   	<option value="02">02</option>
                   	<option value="03">03</option>
                   	<option value="04">04</option>
                   	<option value="05">05</option>
                   	<option value="06">06</option>
                   	<option value="07">07</option>
                   	<option value="08">08</option>
                   	<option value="09">09</option>
                   	<option value="10">10</option>
                   	<option value="11">11</option>
                   	<option value="12">12</option>
                   	<option value="13">13</option>
                   	<option value="14">14</option>
                   	<option value="15">15</option>
                   	<option value="16">16</option>
                   	<option value="17">17</option>
                   	<option value="18">18</option>
                   	<option value="19">19</option>
                   	<option value="20">20</option>
                   	<option value="21">21</option>
                   	<option value="22">22</option>
                   	<option value="23">23</option>
                   	<option value="24">24</option>
                   	<option value="25">25</option>
                   	<option value="26">26</option>
                   	<option value="27">27</option>
                   	<option value="28">28</option>
                   	<option value="29">29</option>
                   	<option value="30">30</option>
                   	<option value="31">31</option>
                   	<option value="32">32</option>
                   	<option value="33">33</option>
                   	<option value="34">34</option>
                   	<option value="35">35</option>
                   	<option value="36">36</option>
                   	<option value="37">37</option>
                   	<option value="38">38</option>
                   	<option value="39">39</option>
                   	<option value="40">40</option>
                   	<option value="41">41</option>
                   	<option value="42">42</option>
                   	<option value="43">43</option>
                   	<option value="44">44</option>
                   	<option value="45">45</option>
                   	<option value="46">46</option>
                   	<option value="47">47</option>
                   	<option value="48">48</option>
                   	<option value="49">49</option>
                   	<option value="50">50</option>
                   	<option value="51">51</option>
                   	<option value="52">52</option>
                   	<option value="53">53</option>
                   	<option value="54">54</option>
                   	<option value="55">55</option>
                   	<option value="56">56</option>
                   	<option value="57">57</option>
                   	<option value="58">58</option>
                   	<option value="59">59</option>
                   </select>
                </div>
                <div class="col-sm-1"></div>
            </div> 
           <p><input aling="center" class="btn btn-lg btn-default center-block" type="submit" id="validar" value="REGISTRARSE"/></p>
        </form>
       </div> 
     </div>
    </div>


    <div class="modal fade" id="FormEvA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 align="center">EDITAR EVENTO</h1>
        </div>
        <form enctype="multipart/form-data" id="fRegEv" action="editar_event.php" method="post">
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="nomu" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-8">
                    <input type="text" class="required form-control" id="nomu" name="nomu" placeholder="Nombre" title="Campo requerido">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="cuposu" class="col-sm-2 col-form-label">Cupos</label>
                <div class="col-sm-8">
                    <input type="text" class="required number form-control" id="cuposu" name="cuposu" placeholder="Cupos" title="Debe ser un número">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="ubiu" class="col-sm-2 col-form-label">Ubicación</label>
                <div class="col-sm-8">
                    <input type="text" class="required form-control" id="ubiu" name="ubiu" placeholder="Ubicación" title="Campo requerido">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="detu" class="col-sm-2 col-form-label">Detalles</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="detu" name="detu" placeholder="Detalles" title="Campo requerido">
                    </textarea>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="cosu" class="col-sm-2 col-form-label">Costo</label>
                <div class="col-sm-8">
                    <input type="text" class="required number form-control" id="cosu" name="cosu" placeholder="Costo" title="Debe ser un número">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="finiu" class="col-sm-2 col-form-label">Inicio</label>
                <div class="col-sm-4">
                    <input type="text" class="required date form-control" id="finiu" name="finiu" placeholder="MM/DD/AAAA" title="Debe ser fecha MM/DD/AAAA">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="ffinu" class="col-sm-2 col-form-label">Fin</label>
                <div class="col-sm-4">
                    <input type="text" class="required date form-control" id="ffinu" name="ffinu" placeholder="MM/DD/AAAA" title="Debe ser fecha MM/DD/AAAA">
                </div>
                <div class="col-sm-1"></div>
            </div> 
            <input type="hidden" name="idu" id="idu">
           <p><input aling="center" class="btn btn-lg btn-default center-block" type="submit" id="validar" value="ACTUALIZAR"/></p>
        </form>
      </div>
    </div>
   </div>

  <div class="modal fade" id="TabEvP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 align="center">PARTICIPANTES DEL EVENTO</h1>
        </div>
        <table class="table">
            <thead id="thead-tabla">
             <tr>
              <td>NOMBRE</td>
              <td>CORREO</td>
              <td>OBSERVACION</td>
              <td>MONTO</td>
             </tr>
            </thead>
            <tbody id="tbodyEvPar">
            </tbody>
        </table>
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
                        <a href="index.php#about">ACERCA</a>
                    </li>
                    <li>
                        <a href="index.php#service">SERVICIOS</a>
                    </li>
                     <li>
                        <a href="index.php#portfolio">GALERIA</a>
                    </li>
                    <li class="active">
                        <a href="eventos.php">EVENTOS</a>
                    </li>
                    <li>
                        <a href="hackatones.php">HACKATONES</a>
                    </li>
                    <?php  
                      if($_SESSION['tipo']=='A'){
                          echo "<li>";
                          echo     "<a href='usuarios.php'>PARTICIPANTES</a>";
                          echo "</li>";
                          echo "<li>";
                          echo    "<a href='proyectos.php'>PROYECTOS</a>";
                          echo "</li>";
                          echo "<li>";
                          echo    "<a href='logout.php'>LOGOUT</a>";
                          echo "</li>";
                      }else{
                          echo "<li>";
                          echo "<a href='hack-eve.php'>HISTORIAL</a>";
                          echo "</li>";
                          echo "<li>";
                          echo     "<a href='logout.php'>LOGOUT</a>";
                          echo "</li>";         
                      }
                    ?>
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
            		<H1>EVENTOS PROXIMOS</H1>	
            	</div>
            	<div class="col-md-3">	
            	</div>
            	<div class="col-md-3">
            		<br>
                <?php 
                  if($_SESSION['tipo']=='A'){
                    echo '<a href="" data-toggle="modal" data-target="#FormEv" class="btn btn-default">CREAR EVENTO</a>';
                  }
                 ?>
            		

            	</div>
            </div>
        </div>
            	<?php 
   								include "conexion.php";
   								$sql="SELECT * FROM evento ORDER BY fecha_ini DESC";
    							$resultado=$base->prepare($sql);
    							$resultado->execute(array());
   								while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                        echo "<div class='row vertical-align'>";
            						$date = date_create($registro["fecha_ini"]);
                        $date2 = date_create($registro["fecha_fin"]);
                        echo "<div class='col-md-1'></div>";
                        echo "<div class='col-md-1'>";
                        echo "<h3>".date_format($date,'d')."</h3><h4>".nombremes(date_format($date,'m'))."</h4>";
                        echo "</div>";
            						echo "<div class='col-md-4'><h4>".$registro["nombre"]."</h4><h5>Del ".date_format($date,'d')." de ".nombremes(date_format($date,'m'))." al ".date_format($date2,'d')." de ".nombremes(date_format($date2,'m'))."<h5></div>";
                        $idev=$registro['id'];
                        if(isset($_SESSION['correo'])&&$_SESSION['tipo']=='A'){    						
                        echo "<div class='col-md-2'>".'<a href="" data-toggle="modal" data-target="#FormEvA" class="btn btn-default ed" data-id="'.$registro['id'].'">EDITAR</a></div>';
            						echo "<div class='col-md-2'><a class='btn btn-default eli' data-id='".$registro['id']."'>ELIMINAR</a></div>";
                        echo "<div class='col-md-2'>".'<a href="" data-toggle="modal" data-target="#TabEvPar" class="btn btn-default mos" data-id="'.$registro['id'].'">PARTICIPANTES</a></div>';
                        }else if(isset($_SESSION['correo'])&&$_SESSION['tipo']=='P'){
                           $sql2="SELECT count(*) as c FROM usuario WHERE correo IN ( SELECT usuario FROM registra WHERE evento=:evento) AND correo=:correo";
                           $r=$base->prepare($sql2);
                           $r->execute(array(":evento"=>$registro['id'],":correo"=>$_SESSION['correo']));
                           $reg2=$r->fetch(PDO::FETCH_ASSOC);
                           if($reg2["c"]==0){
                             $link="anotarse_evento.php?id=".$idev;
                             $var="ANOTARSE";
                             $class="btn btn-default";
                           }else{
                             $link="#";
                             $var="REGISTRADO";
                             $class="btn btn-primary";
                           }
                          
                          echo "<div class='col-md-2'><a href='$link' class='$class'>$var</a></div>";
                          echo "<div class='col-md-2'><a href='' data-toggle='modal' data-target='#TabMasEv' class='btn btn-default mas' data-id='".$registro['id']."'>VER MAS</a></div>";

                        }
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