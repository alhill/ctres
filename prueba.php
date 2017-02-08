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
       $listas = $_POST['listas'];

        // comentario
        $body   = evaluar($_POST['event']);

        //Creamos una nueva variable para evitar problemas con la palabra reservada "end"
        $fin = "end";
        //al seleccionar la opcion de reservas...
        if (isset ($_POST['listas'])){
           // for ($i=0; $i<sizeof($listas); $i++) {

        //foreach ($_POST['listas'] as $valor){
         //echo "$valor";
           //  }
         
            foreach ($_POST['listas'] as $seleccion)
            {
                //echo $seleccion."<br>";///para imprimirla
            $valor.=$seleccion.",";//para almacenarla
            } 
             
            $valor=substr($valor,0,-1);//para eliminar la ultima coma (de tu post anterior)
             
            //echo $valor;




        // foreach ($_POST['listas'] as $valor){
        //echo $valor;
            
            
 
           
        //     // insertamos la reserva
           $query="INSERT INTO lista_reservas (body, opciones, lista, start, $fin, inicio_normal, final_normal) VALUES('$body', '$opciones','$valor', '$inicio', '$final', '$inicio_normal', '$final_normal')";

                // Ejecutamos nuestra sentencia sql
                $conexion->query($query); 


                // Obtenemos el ultimo id insetado
                $im=$conexion->query("SELECT MAX(id) AS id FROM lista_reservas");
                $row = $im->fetch_row();  
                $id = trim($row[0]);   

        // redireccionamos a nuestro calendario
        header("Location:calendario_index.php"); 
        
       }
      }
    }






?>