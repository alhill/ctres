<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>

<head>
	<title>Registro de usuarios</title>
	<!--HOJA CSS provisional-->
	<link rel="stylesheet" type="text/css" href="css/estilo.css">

	<!--BOOTSTRAP-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="validar.js"></script>
</head>

<body>

<div class="row" id="registro">
    
    <?php if (session_status() == PHP_SESSION_NONE) {session_start();} ?>

	<div class="col-md-4 col-md-offset-4" >

		<h2 class="titulo">Crear cuenta</h2>

		<form method="POST" action="" id="formregistro" name="registro" onsubmit="return validar();">
			  <div class="form-group" >
			    <input type="text" class="form-control" id="nom" name="nombre" placeholder="Nombre">
			  </div>

			  <div class="form-group" >
			    <input type="text" class="form-control" id="ape" name="apellido" placeholder="Apellido">
			  </div>

			  <div class="form-group" >
			    <input type="text" class="form-control" id="usu" name="usuario" placeholder="Usuario">
			  </div>

			  <div class="form-group" >
			    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
			  </div>

			  <div class="form-group">
			    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña">
			  </div>

			 <div class="form-group">
			    <input type="password" class="form-control" id="contrasena2" name="contrasena2" placeholder="Repita su contraseña">
			  </div>

          <?php
                 
          if (isset($_SESSION['privilegios']) && $_SESSION['privilegios'] > 1){ //CODIGO QUE CONDICIONE QUE ESTO APAREZCA SOLO SI EL USUARIO TIENE PRIVILEGIOS DE ADMINISTRACIÓN
                echo ('<div class="form-group">
                            <select id="privilegios" name="privilegios" form="formregistro">
                              <option value="1">Usuario</option>
                              <option value="2">Propietario</option>
                              <option value="3">Administrador</option>
                            </select> 
                        </div>');
            }                         
            ?>

            <p><a href="pagina_login.php">¿Ya eres usuario?</a></p> <br>

			<button type="submit" id="butt" class="btn btn-default" name="insertar">Entrar</button> 				
		</form>

	</div>
</div>


						   <!-- Validación del formulario de registro del lado del servidor (PHP)--> 

<?php

include 'config.php';

if (isset($_POST['insertar'])) {

		$nombre = mysqli_real_escape_string ($conexion, $_POST['nombre']); // mysqli_real_escape_string ($con,...) EVITA INYECCIONES SQL
		$apellido = mysqli_real_escape_string ($conexion, $_POST['apellido']);
		$usuario = mysqli_real_escape_string ($conexion, $_POST['usuario']);
		$email = mysqli_real_escape_string ($conexion, $_POST['email']);
		$contrasena = mysqli_real_escape_string ($conexion, $_POST['contrasena']);
		$contrasena2 = mysqli_real_escape_string ($conexion, $_POST['contrasena2']);
		
		if (isset($_POST['privilegios'])){
			$privilegios = mysqli_real_escape_string ($conexion, $_POST['privilegios']);
		}else{
			$privilegios = 1;
		}
        //Pasamos a validar el formulario de registro
	    if(empty($_POST["nombre"])){
	        $errores[] = "El nombre es requerido";
	    }

	    if(empty($_POST["apellido"])){
	       $errores[] = "El apellido es requerido";
	    }

	    if(empty($_POST["usuario"])){
	        $errores[] = "El usuario es requerido";
	    }

	    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) || empty($_POST["email"])){
	         $errores[] = "El email es requerido";
	    }

	    if(empty($_POST["contrasena"]) || strlen($_POST["contrasena"]) != 5){
	      $errores[] = "La contraseña debe contener 5 caracteres";
	    }

	    if(empty($_POST["contrasena2"]) || strlen($_POST["contrasena2"]) != 5){
	      $errores[] = "La contraseña debe contener 5 caracteres";
	    }

     	if($contrasena != $contrasena2) {
			$errores[] = "Las contraseñas no coinciden";
		}else{
				$contrasena = md5($_POST['contrasena']);
		}
		
		if(empty($errores)) {

				$buscarUser = "SELECT * FROM registro WHERE usuario ='$usuario' OR email ='$email'";
				$ejecutar= mysqli_query($conexion, $buscarUser);
				$check = mysqli_num_rows($ejecutar);

				if ($check>0) {

					echo "<script>
						alert('El usuario o email ya existe. Vuelve a intentarlo');history.back();
						</script>";
				}else{

		        //Todo parece correcto procedemos con la insercion

				$query = "INSERT INTO registro (nombre, apellido, usuario, email, contrasena, privilegios) VALUES ('$nombre','$apellido', '$usuario', '$email','$contrasena', '$privilegios')";
				
				$ejecutar = mysqli_query($conexion, $query) or die('Hubo un error durante el registro: ' . mysqli_error($conexion));
                    
				echo "<script> alert('El registro se completó correctamente');
					 window.open('index.php','_self');
					 </script>";
			
				}
			}
		}
?>

<!-- Mostrar errores (en caso de que los haya) con la validación de PHP
<ul>
	<?php if(isset($errores)){
		foreach ($errores as $error){
			echo "<li> $error </li>";
		}
	}
	?>
</ul> -->

</body>
</html>