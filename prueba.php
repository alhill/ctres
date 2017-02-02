 <?php

 date_default_timezone_set("Europe/Madrid");


include 'funciones.php';
include 'config.php';

if (isset($_POST['from'])) {
     // verificamos que no vengan vacios
    if ($_POST['from']!="" AND $_POST['to']!="") {

        // Recibimos el fecha de inicio y la fecha final con la funcion formatear
        $inicio = _formatear($_POST['from']);    
        $final  = _formatear($_POST['to']);

        // fecha de inicio y la fecha final forateada
        $inicio_normal = $_POST['from'];
        $final_normal  = $_POST['to'];

        // Recibimos la opcion de reserva
        $opciones = $_POST['opciones'];
       // $lista = $_POST['lista'];

        // comentario
        $body   = evaluar($_POST['event']);

        //Creamos una nueva variable para evitar problemas con la palabra reservada "end"
        $fin = "end";
        //al seleccionar la opcion de reservas...
        if (isset ($_POST['opciones'])){
            for ($i=0; $i<sizeof($opciones); $i++) {

                
            // insertamos la reserva
            $query="INSERT INTO lista_reservas (body, opciones, start, $fin, inicio_normal, final_normal) VALUES('$body', '$opciones[$i]', '$inicio', '$final', '$inicio_normal', '$final_normal')";

                // Ejecutamos nuestra sentencia sql
                $conexion->query($query); 


                // Obtenemos el ultimo id insetado
                $im=$conexion->query("SELECT MAX(id) AS id FROM lista_reservas");
                $row = $im->fetch_row();  
                $id = trim($row[0]);   

        // redireccionamos a nuestro calendario
        header("Location:inicio_ejemplo.php"); 
        }
       }
      }
    }






?>