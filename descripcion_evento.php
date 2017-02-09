<?php


    //incluimos nuestro archivo config
    include 'config.php'; 

    // Incluimos nuestro archivo de funciones
    include 'funciones.php';

        //  $listas = $_POST['listas'];
        //  $valor ='';

        // if (isset ($_POST['listas'])){
        //    // for ($i=0; $i<sizeof($listas); $i++) {
        //  foreach ($_POST['listas'] as $seleccion)
        //     {
        //         //echo $seleccion."<br>";///para imprimirla
        //     $valor.=$seleccion.",";//para almacenarla
        //     } 
             
        //     $valor=substr($valor,0,-1);       

        // }
        //     $listas = $valor;


    // Obtenemos el id del evento
    $id  = evaluar($_GET['id']);

    // y lo buscamos en la base de dato
    $bd  = $conexion->query("SELECT * FROM lista_reservas WHERE id=$id");

    // Obtenemos los datos
    $row = $bd->fetch_assoc();

    // titulo 
    $titulo=$row['title'];

    // cuerpo
    $evento=$row['body'];

    $opciones=$row['opciones'];
    //$lista=$row['listas'];

    $listas = $row['lista'];

    // Fecha inicio
    $inicio=$row['inicio_normal'];

    // Fecha Termino
    $final=$row['final_normal'];

// Eliminar evento
if (isset($_POST['eliminar_evento'])) 
{
    $id  = evaluar($_GET['id']);
    $sql = "DELETE FROM lista_reservas WHERE id = $id";
    if ($conexion->query($sql)) 
    {
        echo "Evento eliminado";
    }
    else
    {
        echo "El evento no se pudo eliminar";
    }
}
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?=$titulo?></title>
</head>
<body>
	 <h3> titulo de la reserva: <?=$titulo?></h3>
	 <hr>
     <b>Fecha inicio:</b> <?=$inicio?>
     <b>Fecha termino:</b> <?=$final?>     
 	 <p><b>Tipo de reserva: </b><?=$opciones?></p> 
    <p><b>Selección: </b><?=$listas?></p> 
     <!--<p><?=$evento?></p>-->
</body>
<!-- <form action="" method="post">
    <button type="submit" class="btn btn-danger" name="eliminar_evento">Eliminar</button>
</form> -->
</html>
