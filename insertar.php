<?php

include 'config.php';

    if (isset($_POST['insertar'])) {
        $nombre = mysqli_real_escape_string ($conexion, $_POST['nombre']); // mysqli_real_escape_string ($con,...) EVITA INYECCIONES SQL
        $apellido = mysqli_real_escape_string ($conexion, $_POST['apellido']);
        $usuario = mysqli_real_escape_string ($conexion, $_POST['usuario']);
        $email = mysqli_real_escape_string ($conexion, $_POST['email']);
   
        $contrasena = mysqli_real_escape_string ($conexion, $_POST['contrasena']);
        $contrasena2 = mysqli_real_escape_string ($conexion, $_POST['contrasena2']);

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

				//Todo parece correcto procedemos con la inserccion
				$query = "INSERT INTO registro (nombre, apellido, usuario, email, contrasena) VALUES ('$nombre','$apellido', '$usuario', '$email','$contrasena')";
				
				$ejecutar = mysqli_query($conexion, $query) or die(mysqli_error());
			
				echo "<script> alert('registro exitoso');
					 window.open('inicio_ejemplo.php','_self');
					 </script>";
			}
		}
	}
				

	
	
?>