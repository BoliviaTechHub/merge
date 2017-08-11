<?php session_start();?>
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
        .er{
            color: rgb(169,68,66);
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
                <div class="col-sm-3"></div>
                <div class="col-sm-8" id='dc'>
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
        <form id="fLog" action="index.php" method="post">
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
            <div class="form-group row">
                <div class="col-sm-3"></div>
                <div class="col-sm-8" id='er'>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <p><input aling="center" class="btn btn-lg btn-default center-block" type="submit" id="validar" value="ENTRAR"/></p>
        </form>

       </div> 
     </div>
    </div>
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
                    <li>
                        <a href="#service">SERVICIOS</a>
                    </li>
                     <li>
                        <a href="#portfolio">GALERIA</a>
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
                                include "incl/menu_login_p.php";
                            }else if($_SESSION["tipo"]=="A"){
                                include "incl/menu_login_a.php";
                            }
                        }else{
                            include "incl/menu_sin_login.php";    
                        } 
                    ?>
                    
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('img/banner.jpg');"></div>
                <div class="carousel-caption">
                    <h2>BOLIVIA TECH HUB</h2>
                </div>
            </div> 
            
        </div>

    </header>

    <section class="about" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title st-center">
                            <h3>Bolivia Tech Hub Collaborative</h3>
                            <p>Promoviendo la tecnologia e innovacion</p>
                        </div>
                        <div class="row mb90">
                            <div class="col-md-6">
                                <p>Bolivia Tech Hub es un espacio de desarrollo colaborativo de proyectos tecnologicos relacionados a TIC. 
                                </p>
                                <p>Generamos oportunidades de aprendizaje , desarrollo , ofertas laborales en nuevas areas de estudio en base a retos , competenciaas nacionales e internacionales denomidados hackatones.</p>
                                </p>Tenemos la Vision de convertirnos en un centro de innovacion en tecnologia apoyando al desarrollo de los Jovenes creando realciones y oportunidades con otros entre entes interesados o con necesidades en TIC.</p>
                                <P>Contamos con un laboratorio de Realidad Virtual, Robotica & Electronica , RFID.</P>
                            </div>
                            <div class="col-md-6">
                                <img src="img/about.jpg" alt="" class="img-responsive">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="st-member">
                                    <div class="st-member-img">
                                        <img src="img/member1.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="st-member-info">
                                        <h1>Pamela Gonzales</h1>
                                        <p>Co-Founder</p>
                                
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="st-member">
                                    <div class="st-member-img">
                                        <img src="img/member2.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="st-member-info">
                                        <h1>Willmar Pimentel</h1>
                                        <p>Co-Founder</p>
                                        
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="st-member">
                                    <div class="st-member-img">
                                        <img src="img/member3.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="st-member-info">
                                        <h1>Jorge Teran</h1>
                                        <p>Co-Founder</p>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="service" id="service">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title st-center">
                            <h3>Nuestros Servicios</h3>
                            <p>Innovacion=Bolivia Tech Hub</p>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="st-feature">
                                    <div class="st-feature-icon"><i class="fa fa-cog"></i></div>
                                    <strong class="st-feature-title">Cowork</strong>
                                    <p>El primer cowork del pais.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="st-feature">
                                    <div class="st-feature-icon"><i class="fa fa-cube"></i></div>
                                    <strong class="st-feature-title">Laboratorio Rfid</strong>
                                    <p>Equipado con lo que tu necesitas para tus proyectos Rfid.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="st-feature">
                                    <div class="st-feature-icon"><i class="fa fa-level-up"></i></div>
                                    <strong class="st-feature-title">Laboratorio de Robotica & Electronica</strong>
                                    <p>Ven a probar nuestras impresoras 3D.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="st-feature">
                                    <div class="st-feature-icon"><i class="fa fa-location-arrow"></i></div>
                                    <strong class="st-feature-title">Laboratorio de Realidad Virtual</strong>
                                    <p>Oculus,Htc,GearVR,Gear360,Carboard.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="st-feature">
                                    <div class="st-feature-icon"><i class="fa fa-code"></i></div>
                                    <strong class="st-feature-title">Desarrollo de Software</strong>
                                    <p>Software a medida.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="st-feature">
                                    <div class="st-feature-icon"><i class="fa fa-line-chart"></i></div>
                                    <strong class="st-feature-title">Hackatones</strong>
                                    <p>Organizamos el hackaton que necesitas para tu empresa/institucion</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="st-feature">
                                    <div class="st-feature-icon"><i class="fa fa-magic"></i></div>
                                    <strong class="st-feature-title">Gadgets</strong>
                                    <p>Infinidad de accesorios para el proyecto necesitas.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="st-feature">
                                    <div class="st-feature-icon"><i class="fa fa-bicycle"></i></div>
                                    <strong class="st-feature-title">Entrenamiento Personal</strong>
                                    <p>Aprende con nosotros.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="features-desc">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">

            

            allowfullscreen class="img-responsive">
                    </iframe> 
                        
                    </div>
                    <div class="col-md-7">
                        <h3 class="bottom-line">Estamos Ubicados en La Paz - Bolivia Horario de Atencion 2PM-9PM Lun - Sab</h3>
                        <a href="https://www.google.com/maps/place/Bolivia+Tech+Hub/@-16.513402,-68.124362,15z/data=!4m5!3m4!1s0x0:0x259d81fbc8feb854!8m2!3d-16.5134022!4d-68.1243619?hl=en-US" class="btn btn-main btn-lg"> #2687 Avenida Sanchez Lima Esq Pasaje Fabiani, Sopocachi</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="portfolio" id="portfolio">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-md-12 no-padding ">
                        <div class="section-title st-center">
                            <h1 align="center">Galeria</h1>
                        </div>
                        

         <!-- Work Section Start -->
  <section id="works" align ="">
    <div class="container">
      <div class="row">
      
        <div class="col-md-6" data-wow-delay="1.2s">
            <img src="img/portfolio.jpg" alt="">
            <img src="img/portfolio0.jpg" alt="">
            <img src="img/portfolio1.jpg" alt="">
            <img src="img/portfolio2.jpg" alt="">
        </div>
        <div class="col-md-6" data-wow-delay="1.6s">
            <img src="img/portfolio3.jpg" alt="">
            <img src="img/portfolio4.jpg" alt="">
            <img src="img/portfolio5.jpg" alt="">
            <img src="img/portfolio6.jpg" alt="">
        </div>
        <div class="browse-box">
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
