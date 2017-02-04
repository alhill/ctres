<?php

include 'config.php';

    //DEBUG
    /* print_r($_POST);
    die(); */

    if (isset($_POST['insertar'])) {
        $nombre = mysqli_real_escape_string ($conexion, $_POST['nombre']); // mysqli_real_escape_string ($con,...) EVITA INYECCIONES SQL
        $apellido = mysqli_real_escape_string ($conexion, $_POST['apellido']);
        $usuario = mysqli_real_escape_string ($conexion, $_POST['usuario']);
        $email = mysqli_real_escape_string ($conexion, $_POST['email']);
   
        $contrasena = mysqli_real_escape_string ($conexion, $_POST['contrasena']);
        $contrasena2 = mysqli_real_escape_string ($conexion, $_POST['contrasena2']);
        $privilegios = mysqli_real_escape_string ($conexion, $_POST['privilegios']);

     	if($contrasena!=$contrasena2) {
				echo "Las contraseñas no coinciden";
			}else {

				$contrasena = md5($_POST['contrasena']);
				$buscarUser = "SELECT * FROM registro WHERE usuario ='$usuario' OR email ='$email'";
				$ejecutar= mysqli_query($conexion, $buscarUser);
				$check = mysqli_num_rows($ejecutar);

				if ($check>0) {

					echo "<script>
					alert('El usuario o email ya existe. Vuelve a intentarlo');
					history.back();
					</script>";
				}else{

				//Todo parece correcto procedemos con la insercion
				$query = "INSERT INTO registro (nombre, apellido, usuario, email, contrasena, privilegios) VALUES ('$nombre','$apellido', '$usuario', '$email','$contrasena', '$privilegios')";
				
				$ejecutar = mysqli_query($conexion, $query) or die('Hubo un error durante el registro: ' . mysqli_error($conexion));
                    
			
				echo "<script> alert('El registro se completó correctamente');
					 window.open('calendario_index.php','_self');  
					 </script>";
			} //OJOOO
		}
	}
				

	
	
?>