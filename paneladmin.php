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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	
	<title>C3PO</title>
</head>

<body>
    
    <div id="borrar" class="modal fade ventanamodal" role="dialog">
        <div class="loginaso">
            <p>¿Está seguro de que desea borrar el usuario <span class="nombredeusuario"></span>?</p>
                <button type="button" id="aceptaborrar">Aceptar</button>
                <button type="button" id="cancelaborrar">Cancelar</button>
        </div>
    </div>
    
    <div id="modif" class="modal fade ventanamodal" role="dialog">
        <div class="loginaso">
            <p>¿Está seguro de que desea modificar el usuario <span class="nombredeusuario"></span>?</p>
                <button type="button" id="aceptamodif">Aceptar</button>
                <button type="button" id="cancelamodif">Cancelar</button>
        </div>
    </div>
    
    <div class="container">
    
    <?php 
    include "header.php";
    if($_SESSION['privilegios']<3)
    {
        die("No tienes privilegios para acceder a esta zona");
    }
    $bbddusuarios = mysqli_query($conexion, "SELECT * FROM registro"); 
    $bbddsalas = mysqli_query($conexion, "SELECT * FROM salas");
    ?>
    
    <input type="button" value="Crear nuevo usuario" onclick="window.location = 'registro.php';">
    
    <h2>Lista de usuarios</h2>
    <?php
    
    echo ("<table class='tabla_admin'><th><b>ID</b></th><th><b>Usuario</b></th><th><b>Contraseña</b></th><th><b>Email</b></th><th><b>Nombre</b></th><th><b>Apellidos</b></th><th><b>Privilegios</b></th>");
    while($arrayusuarios = $bbddusuarios -> fetch_assoc()){  //Convierte $resultado, que es un objeto mySQL en un array asociativo (clave, valor)
        echo ("<tr><td>".$arrayusuarios["id"]."</td><td>".$arrayusuarios["usuario"]."</td><td>".$arrayusuarios["contrasena"]."</td><td>".$arrayusuarios["email"]."</td><td>".$arrayusuarios["nombre"]."</td><td>".$arrayusuarios["apellido"]."</td><td>".$arrayusuarios["privilegios"]."</td><td><input type='button' value='Modificar' onclick=modalModif(&#34;".$arrayusuarios["usuario"]."&#34;);></td><td><input type='button' value='Borrar' class='botonmodif' onclick=modalBorr(&#34;".$arrayusuarios["usuario"]."&#34;);></td></tr>");
    }
    echo ("</table>");

    ?>
    
    
    <h2>Lista de salas</h2>
    <input type="button" value="Crear nueva sala" onclick="window.location = 'nuevasala.php';">
    
    <?php 
        
        echo ("<table class='tabla_admin'>");
        while($arraysalas = $bbddsalas -> fetch_assoc()){
            echo ("<tr><td>" . $arraysalas['nombre'] . "<td><input type='button' value='Modificar' onclick=modalModif(&#34;".$arrayusuarios["usuario"]."&#34;);></td><td><input type='button' value='Borrar' class='botonmodif' onclick=modalBorr(&#34;".$arrayusuarios["usuario"]."&#34;);></td></tr>");
        }
        echo ("</table>");
    
    ?>
        
    </div>
    
    
</body>
    
</html>