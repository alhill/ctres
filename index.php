<!DOCTYPE html>
<html lang="ES">
<head>
	<title>Galeria</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	<!-- Inserto las librerias de jquery y bootstrap -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/reset.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">

</head>

<body>
    <?php 
    include 'config.php'; 
    include 'header.php';
    ?>
    
 <div class="container-fluid" id="estilo_index">
        
   <?php
    if (session_status() == PHP_SESSION_NONE) {session_start();}
    if (isset($_SESSION['privilegios']) && $_SESSION['privilegios']>0){
        
    }
    ?> 
        
        

        
      <?php
        $posicion = 0;
        $bbddsalas = mysqli_query($conexion, 'SELECT * FROM salas');
        
        while($arraysalas = $bbddsalas -> fetch_assoc()){
            
            if ($posicion % 2 == 0) { echo('<div class="row"><div id="sala" class="col-sm-5 col-sm-offset-1 bloquesala">'); }
            else{ echo('<div id="sala"  class="col-sm-5 bloquesala">');}
        
        ?>
  
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
 
        <?php include 'footer.php'; ?>
   
        

    
   

</body>