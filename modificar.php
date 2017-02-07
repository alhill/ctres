<?php

include 'config.php';

if (session_status() == PHP_SESSION_NONE) {session_start();}

    if ((isset($_SESSION['privilegios']) && $_SESSION['privilegios'] < 3) || !isset($_SESSION['privilegios']))
    {
        die();
    }

$url = $_SERVER['REQUEST_URI'];
$usuario = parse_url($url, PHP_URL_QUERY);

    //DEBUG
    /* print_r($_POST);
    die(); */

    if (isset($_POST['modificar'])) {
        $nombre = mysqli_real_escape_string ($conexion, $_POST['nombre']); // mysqli_real_escape_string ($con,...) EVITA INYECCIONES SQL
        $apellido = mysqli_real_escape_string ($conexion, $_POST['apellido']);
        $email = mysqli_real_escape_string ($conexion, $_POST['email']);
   
        $contrasena = mysqli_real_escape_string ($conexion, $_POST['contrasena']);
        $contrasena2 = mysqli_real_escape_string ($conexion, $_POST['contrasena2']);
        $privilegios = mysqli_real_escape_string ($conexion, $_POST['privilegios']);

     	if($contrasena!=$contrasena2) {
				echo "Las contraseñas no coinciden";
			}else {

				$contrasena = md5($_POST['contrasena']);
				$buscarUser = "SELECT * FROM registro WHERE usuario ='$usuario'";
				$ejecutar= mysqli_query($conexion, $buscarUser); 
				$check = mysqli_num_rows($ejecutar); 

				if ($check>0) {

				//Todo parece correcto procedemos con la modificacion
				
                mysqli_query($conexion, "UPDATE registro SET nombre='$nombre', apellido='$apellido', contrasena='$contrasena', privilegios='$privilegios', email='$email' WHERE usuario='$usuario'") or die("Error en la modificación de datos");
                    
                echo "Modificación realizada correctamente";
                header("Location: paneladmin.php");                  
   
				}
                else{
                    echo("Error: El usuario no existe");
                }
		}
	}
	
?>