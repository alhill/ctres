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
        
    <?php
        $posicion = 0;
        include 'config.php';
        $bbddsalas = mysqli_query($conexion, 'SELECT * FROM salas');
        
        while($arraysalas = $bbddsalas -> fetch_assoc()){
            
            if ($posicion % 2 == 0) { echo('<div class="row">'); }
        
        ?>
                
                <div class="col-sm-5">
                    <div class="img-thumbnail img-responsive" alt="Imagen responsive">
                        <a href="pagina_login.php" >
                        <img src="<?php echo($arraysalas['urlimagen']); ?>">
                        <ul class="Descripcion"><h4><?php echo($arraysalas['nombre']); ?><small>  <?php echo($arraysalas['subtitulo']); ?></small></h4>
                            <?php echo($arraysalas['descripcion']); ?>
                        </ul>
                        </a>
                    </div>
                </div>
        
        <?php if ($posicion % 2 != 0) { echo('</div>'); } 
                $posicion++;
        }
        
        ?>

    </div> 
    </div>

</body>