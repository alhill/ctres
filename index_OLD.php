<!DOCTYPE html>
<html>
<head>
	<title>Galeria</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	<!-- Inserto las librerias de jquery y bootstrap -->

	  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="Css/galeria.css">

</head>

<body>
    <div class="container">
        
   <?php
    if (session_status() == PHP_SESSION_NONE) {session_start();}
    if (isset($_SESSION['privilegios']) && $_SESSION['privilegios']>0){
        include 'header.php';
    }
    ?> 
    
    <header>
	
        <div id="Fondo">
            <div class="img img-responsive" alt="Imagen responsive">
                <img  src="img/Cabecera.jpg">
            </div>
        </div>
        </header>
        <div class="ui-grid-a ui-responsive">
            <div class="row">
                <div class="col-sm-5" id="derecha">
                    <div class="img-thumbnail img-responsive" alt="Imagen responsive">
                        <a href="pagina_login.php" >
                        <img  src="img/Salas/Sala1.jpg">
                        <ul class="Descripcion"><h4>Sala Venecia<small>  Especial para pequeñas reuniones</small></h4>
                            <li>Capacidad de 10 personas</li>
                            <li>Ordenador de sobremesa</li>
                            <li> 25 m <sup>2</sup></li>
                        </ul>
                        </a>
                    </div>
                </div>

                <div class="col-sm-5" id="derecha">
                    <div class="img-thumbnail img-responsive" alt="Imagen responsive">
                        <a href="pagina_login.php" >
                        <img  src="img/Salas/Sala2.jpg">
                        <ul class="Descripcion"><h4>Salón Nelson Mandela <small>  Especial para conferencias</small></h4>
                            <li>Capacidad de 250 personas</li>
                            <li>Mesa para ponentes</li>
                            <li> 325 m <sup>2</sup></li>
                            </ul>
                        </a>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5" id="derecha">
                    <div class="img-thumbnail img-responsive" alt="Imagen responsive">
                        <a href="pagina_login.php" >
                        <img  src="img/Salas/Sala3.jpg">
                        <ul class="Descripcion"><h4>Sala Salvador Dalí<small>  Especial para metodologia Scrum</small></h4>
                            <li>Capacidad de 12 personas</li>
                            <li>Mesa redonda</li>
                            <li> 18 m <sup>2</sup></li>
                            </ul>
                        </a>

                    </div>
                </div>

                <div class="col-sm-5" id="derecha">
                    <div class="img-thumbnail img-responsive" alt="Imagen responsive">
                        <a href="pagina_login.php" >
                        <img  src="img/Salas/Sala4.jpg">
                        <ul class="Descripcion"><h4>Sala Rafael Casanova<small>  Formación para empleados</small></h4>
                            <li>Capacidad de 200 personas</li>
                            <li>Atril para Ponencia </li>
                            <li> 180 m <sup>2</sup></li>
                            </ul>
                        </a>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5" id="derecha">
                    <div class="img-thumbnail img-responsive" alt="Imagen responsive">
                        <a href="pagina_login.php" >
                        <img  src="img/Salas/Sala5.jpg">
                        <ul class="Descripcion"><h4>Sala Venecia<small>  Especial para trabajo en equipo</small></h4>
                            <li>Capacidad de 26 personas</li>
                            <li>Pizarra</li>
                            <li> 30 m <sup>2</sup></li>
                            </ul>
                        </a>

                    </div>
                </div>

                <div class="col-sm-5" id="derecha">
                    <div class="img-thumbnail img-responsive" alt="Imagen responsive">
                        <a href="pagina_login.php" >
                        <img  src="img/Salas/Sala6.jpg">
                        <ul class="Descripcion"><h4>Salón Antoni Gaudí<small>  para reuniones de accionistas</small></h4>
                            <li>Capacidad de 60 personas</li>
                            <li>Proyector</li>
                            <li> 80 m <sup>2</sup></li>
                            </ul>
                        </a>

                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-sm-5" id="derecha">
                <div class="img-thumbnail img-responsive" alt="Imagen responsive">
                    <a href="pagina_login.php" >
                        <img  src="img/Salas/Sala7.jpg">
                        <ul class="Descripcion"><h4>Sala Londres<small>  Especial para formación</small></h4>
                            <li>Capacidad de 20 personas</li>
                            <li>Pizarra y proyector</li>
                            <li> 27 m <sup>2</sup></li>
                        </ul>
                        </a>

                    </div>
                </div>

                <div class="col-sm-5" id="derecha">
                    <div class="img-thumbnail img-responsive" alt="Imagen responsive">
                        <a href="pagina_login.php" >
                        <img  src="img/Material/Pc.jpg">
                        <ul class="Descripcion"><h4>Materiales Disponibles<small>  LLame para más información</small></h4>
                            <li>Proyector,Pc sobremesa, Portátiles </li>
                            <li>Micrófono de mesa, Micrófono de diadema </li>
                            <li>Sistema de traducción simultanea, etc </li>
                            </ul>
                        </a>
                    </div>
                </div>
            </div>
    </div>
    </div>

</body>