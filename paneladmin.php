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
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,400,700" rel="stylesheet">

	
	<title>C3PO</title>
</head>

<body>
    
    <?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION['privilegios']) || ($_SESSION['privilegios']<2 && isset($_SESSION['privilegios'])))
    {
        header('Location: index.php');
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
                <button class="btn btn-mio1_admin" type="button" id="aceptaborrar">Aceptar</button>
                <button class="btn btn-mio1_admin" type="button" id="cancelaborrar">Cancelar</button>
        </div>
    </div>
    
    <div id="modif" class="modal fade ventanamodal" role="dialog">
        <div class="loginaso">
            <p>¿Está seguro de que desea modificar el usuario <span class="nombredeusuario"></span>?</p>
                <button class="btn btn-mio1_admin" type="button" id="aceptamodif">Aceptar</button>
                <button class="btn btn-mio1_admin" type="button" id="cancelamodif">Cancelar</button>
        </div>
    </div>
    
        <div id="borrarsala" class="modal fade ventanamodal" role="dialog">
        <div class="loginaso">
            <p>¿Está seguro de que desea borrar la sala número <span class="nombredesala"></span>?</p>
                <button class="btn btn-mio1_admin" type="button" id="aceptaborrarsala">Aceptar</button>
                <button class="btn btn-mio1_admin" type="button" id="cancelaborrarsala">Cancelar</button>
        </div>
    </div>
    
    <div id="modifsala" class="modal fade ventanamodal" role="dialog">
        <div class="loginaso">
            <p>¿Está seguro de que desea modificar la sala número <span class="nombredesala"></span>?</p>
                <button class="btn btn-mio1_admin" type="button" id="aceptamodifsala">Aceptar</button>
                <button class="btn btn-mio1_admin" type="button" id="cancelamodifsala">Cancelar</button>
        </div>
    </div>
    
    <?php include "header_admin.php"; ?>
    
    <div class="container">
    
    
    <?php
        if(isset($_SESSION["privilegios"]) && ($_SESSION["privilegios"]==3))
        {
            echo("<input class='btn btn-mio1_admin' type='button' value='Crear nuevo usuario' onclick=window.location=" . '"registro.php"; >');
            echo("<input class='btn btn-mio1_admin' type='button' value='Crear nueva sala' onclick=window.location=" . '"nuevasala.php"; >');
        }
    ?>
  
    
    <?php
        if(isset($_SESSION["privilegios"]) && ($_SESSION["privilegios"]==2))
        {
            echo("<input class='btn btn-mio1_admin' type='button' value='Editar usuario' onclick='enlaceEditar(". '"' . $_SESSION['usuario'] . '"' . ")'>");
        }    
        
    ?>
    
    <?php
        if(isset($_SESSION["privilegios"]) && ($_SESSION["privilegios"]==3))
        {
            echo("<h2 class='titulo_panelad'>Lista de usuarios</h2>");
    
            echo ("<table class='table table-striped tabla_admin'><thead><th><b>ID</b></th><th><b>Usuario</b></th><th><b>Contraseña</b></th><th><b>Email</b></th><th><b>Nombre</b></th><th><b>Apellidos</b></th><th><b>Privilegios</b></th><th><b><th><b></b></b></thead>");
            while($arrayusuarios = $bbddusuarios -> fetch_assoc()){  //Convierte $resultado, que es un objeto mySQL en un array asociativo (clave, valor)
            echo ("<tr><td>".$arrayusuarios["id"]."</td><td>".$arrayusuarios["usuario"]."</td><td>".$arrayusuarios["contrasena"]."</td><td>".$arrayusuarios["email"]."</td><td>".$arrayusuarios["nombre"]."</td><td>".$arrayusuarios["apellido"]."</td><td>".$arrayusuarios["privilegios"]."</td><td><input class='btn btn-mio1_admin' type='button' value='Modificar' onclick=modalModif(&#34;".$arrayusuarios["usuario"]."&#34;);></td><td><input class='btn btn btn-mio1_admin' type='button' value='Borrar' class='botonmodif' onclick=modalBorr(&#34;".$arrayusuarios["usuario"]."&#34;);></td></tr>");
            }
            echo ("</table>");
        }

    ?>
        
    <h2  class='titulo_panelad'>Lista de salas</h2>
    
    <form method="POST" action="" id="salasmodborr" name="salasmodborr"> 
        
    <?php 
        if(isset($_SESSION["privilegios"]) && ($_SESSION["privilegios"]==3))
        {
            echo ('<table class="table table-striped tabla_admin"><thead><th><b>ID</b></th><th><b>Nombre</b></th><th><b>Propietario</b></th><th><b></b></th><th><b></b></th></thead>');
            while($arraysalas = $bbddsalas -> fetch_assoc()){
                echo ("<tr><td>" . $arraysalas["id"] . "</td><td>" . $arraysalas["nombre"] . "</td><td>" . $arraysalas["propietario"] . "</td><td><input class='btn btn-mio1_admin' type='button' value='Modificar' onclick=modalModifSala(&#34;".$arraysalas["id"]."&#34;);></td><td><input class='btn btn-mio1_admin' type='button' value='Borrar' class='botonmodif' onclick=modalBorrSala(&#34;".$arraysalas["id"]."&#34;);></td></tr>");
            } 

            echo ("</table>");
        }else{
            echo ('<table class="table table-striped tabla_admin"><thead><th><b>ID</b></th><th><b>Nombre</b></th></thead>');
            while($arraysalas = $bbddsalas -> fetch_assoc()){
                echo ("<tr><td>" . $arraysalas["id"] . "</td><td>" . $arraysalas["nombre"] . "</td><td><input class='btn btn-mio1_admin' type='button' value='Modificar' onclick=modalModifSala(&#34;".$arraysalas["id"]."&#34;);></td></tr>");
            } 

            echo ("</table>");
        }
    
    ?>
        
    </form>
        
    </div>
     <!--<?php include 'footer.php'; ?>-->
</body>
    
</html>