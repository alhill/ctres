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
        $valor = '';

        //Creamos una nueva variable para evitar problemas con la palabra reservada "end"
        $fin = "end";
       

        // $opciones = $_POST['opciones'];
        // $lista_salas = $_POST['lista_salas'];
        // $lista_materiales = $_POST['lista_materiales'];

        // Recibimos la opcion de reserva
        if (isset($_POST['opciones'])){
            $opciones = $_POST['opciones'];

            if (isset($_POST['lista_salas'])){
                $lista_salas = $_POST['lista_salas'];
            
                $buscarSala = "SELECT * FROM lista_reservas WHERE (lista_salas = '$lista_salas')";

                $buscar = mysqli_query($conexion, $buscarSala);
                $check = mysqli_num_rows($buscar);

                //El problema es que si check>0 no te deja reservar. Entonces aunque sea otra sala, como en el horario va a haber una coincidencia, check va a ser mayor que cero y no te va a dejar reservar ninguna

                //Por eso hacemos una query solo con las salas y luego, si hay coincidencias en las salas, hacemos otra query con las fechas 

                if ($check>0){

                    $buscarFecha = "SELECT * FROM lista_reservas WHERE (start = '$inicio' AND $fin = '$final') OR (start < '$final' AND $fin >= '$final') OR (start >= '$inicio' AND $fin <= '$final')";

                    $buscar2 = mysqli_query($conexion, $buscarFecha);
                    $check2 = mysqli_num_rows($buscar2);

                    if ($check2>0){

                        echo "<script>
                            alert('Esa sala ya se encuentra reservada en esa franja horaria. Seleccione otra hora o fecha');history.back();
                            </script>";

                        die();    
                    }                                        
                }

            }else{
                    $lista_salas = null;
                }

            if (isset ($_POST['lista_materiales'])){
                foreach ($_POST['lista_materiales'] as $seleccion){
                    $valor.=$seleccion.",";//para almacenarla
                }   
            $valor=substr($valor,0,-1);//para eliminar la ultima coma (de tu post anterior)
            }else{
                $lista_materiales = null;
            }
        }
        
        //Insertamos una referencia
        $ref = $_POST['title'];

        // Y un comentario
        $body = evaluar($_POST['event']);

        //al seleccionar la opcion de reservas...
     
        // insertamos la reserva
        $query="INSERT INTO lista_reservas (title, body, opciones, lista_salas, lista_materiales, start, $fin, inicio_normal, final_normal) VALUES('$ref', '$body', '$opciones', '$lista_salas', '$valor', '$inicio', '$final', '$inicio_normal', '$final_normal')";

        // Ejecutamos nuestra sentencia sql
        $conexion->query($query);

        // Obtenemos el ultimo id insertado
        $im=$conexion->query("SELECT MAX(id) AS id FROM lista_reservas");
        $row = $im->fetch_row();  
        $id = trim($row[0]); 

        // para generar el link del evento
        $link = "$base_url"."descripcion_evento.php?id=$id";

        // y actualizamos su link
        $query="UPDATE lista_reservas SET url = '$link' WHERE id = $id";

        // Ejecutamos nuestra sentencia sql
        $conexion->query($query);

        // redireccionamos a nuestro calendario
        // echo "<script>
        //         alert('Reserva realizada con éxito');
        //      </script>"; 

        // die('bye bye');

        header("Location:calendario_index.php"); 
 
    }
}
                
?>