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

    $bbddsalas = mysqli_query($conexion, "SELECT * FROM salas"); 

    ?>
    
    <div id="borrarreserva" class="modal fade ventanamodal" role="dialog">
        <div class="loginaso">
            <p>¿Está seguro de que desea borrar la reserva número <span class="numreserva"></span>?</p>
                <button class="btn btn-mio1_admin" type="button" id="aceptaborrarreserva">Aceptar</button>
                <button class="btn btn-mio1_admin" type="button" id="cancelaborrarreserva">Cancelar</button>
        </div>
    </div>
    
    <div id="modifreserva" class="modal fade ventanamodal" role="dialog">
        <div class="loginaso">
            <p>¿Está seguro de que desea modificar la reserva número <span class="numreserva"></span>?</p>
                <button class="btn btn-mio1_admin" type="button" id="aceptamodifreserva">Aceptar</button>
                <button class="btn btn-mio1_admin" type="button" id="cancelamodifreserva">Cancelar</button>
        </div>
    </div>
    
    <?php include "header_admin.php"; ?>
    
    <div class="container">
    
    
    <?php
        while($arraysalas = $bbddsalas -> fetch_assoc()){ 
            if ($arraysalas['id'] != 8){ //NO MOSTRAR MATERIALES DISPONIBLES COMO UNA SALA EN LA LISTA DE RESERVAS
                $bbddreservas = mysqli_query($conexion, "SELECT * FROM lista_reservas WHERE lista_salas='".$arraysalas['nombre']."' ORDER BY start ASC;"); 
                if((isset($_SESSION["privilegios"]) && ($_SESSION["privilegios"]==3)) || (isset($_SESSION["privilegios"]) && ($_SESSION["privilegios"]==2 && ($_SESSION['usuario'] == $arraysalas['propietario']))))
                {
                    echo("<h3 class='titulo_panelad'>".$arraysalas['nombre']."</h3>");

                    echo ("<table class='table table-striped tabla_admin'><thead><th><b>ID</b></th><th><b>Reservado por</b></th><th><b>Desde</b></th><th><b>Hasta</b></th><th></th></thead>");
                    while($arrayreservas = $bbddreservas -> fetch_assoc()){  //Convierte $resultado, que es un objeto mySQL en un array asociativo (clave, valor)
                    echo ("<tr><td>".$arrayreservas["id"]."</td><td>".$arrayreservas['usuario']."</td><td>".$arrayreservas["inicio_normal"]."</td><td>".$arrayreservas["final_normal"]."</td><td><input class='btn btn-mio1_admin' type='button' value='Borrar' onclick=modalBorrReserva(&#34;".$arrayreservas["id"]."&#34;);></td></tr>");
                    }
                    if ($bbddreservas -> num_rows == 0){echo("<tr><td colspan=5><b>No hay reservas</b></td></tr>");}
                    echo ("</table><br>");
                }
            }
        }

    ?>
        
        
    </div>
     <!--<?php include 'footer.php'; ?>-->
</body>
    
</html>