<?php include "config.php" ?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/reset.css" type="text/css" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="js/script.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/estilo.css" type="text/css" />

    <link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,400,700" rel="stylesheet">
	
	<title>C3PO</title>
</head>

<body>
    
    <?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION['privilegios']) || ($_SESSION['privilegios']>1 && isset($_SESSION['privilegios'])))
    {
        header('Location: paneladmin.php');
        die();
    }

    $bbddusuarios = mysqli_query($conexion, "SELECT * FROM registro"); 

    if(isset($_SESSION['privilegios']) && $_SESSION['privilegios']==3){
        $propi = "";
    }else{
        $propi = "WHERE propietario='" . $_SESSION['usuario'] . "'";
    }
    
    $querita = "SELECT * FROM salas " . $propi;
    $bbddsalas = mysqli_query($conexion, $querita);

    ?>
    
    <div id="borrar" class="modal fade ventanamodal" role="dialog">
        <div class="loginaso">
            <p>¿Está seguro de que desea borrar el usuario <span class="nombredeusuario"></span>?</p>
                <button class="btn btn-mio1" type="button" id="aceptaborrar">Aceptar</button>
                <button class="btn btn-mio1" type="button" id="cancelaborrar">Cancelar</button>
        </div>
    </div>
    
    <div id="modif" class="modal fade ventanamodal" role="dialog">
        <div class="loginaso">
            <p>¿Está seguro de que desea modificar el usuario <span class="nombredeusuario"></span>?</p>
                <button class="btn btn-mio1" type="button" id="aceptamodif">Aceptar</button>
                <button class="btn btn-mio1" type="button" id="cancelamodif">Cancelar</button>
        </div>
    </div>

    
    <?php include "header.php"; ?>
    
    <div class="container user">

        <h2 class="titulo_usuario">Perfil del usuario</h2>

        <table class="table table-striped tabla_usuario">
            <thead>
                <tr>
                    <th>Datos de usuario</th>
                </tr>
            </thead>
            <tbody>

    <?php
        if (isset($_SESSION['usuario'])) {          
    ?>
        <tr>
            <td><?php echo "Nombre: " . $_SESSION['nombre']; echo "<br>"; echo "Apellido: " . $_SESSION['apellido']; echo "<br>";  echo "Usuario: " .  $_SESSION['usuario']; echo "<br>"; echo "Email: " .  $_SESSION['email']; echo "<br>"; ?></td>
        </tr>
    
    <?php } ?>
            </tbody>
        </table>
    
    
    <?php
            echo("<input class='btn btn-mio1' type='button' value='Modificar datos' onclick='enlaceEditar(". '"' . $_SESSION['usuario'] . '"' . ")'>");           
    ?>        <!--btn-usuario-->

    </div>
 <!--     <?php include 'footer.php'; ?> -->
</body>
    
</html>