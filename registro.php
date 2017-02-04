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


</head>
<body>

<div class="row" id="registro">
    
    <?php if (session_status() == PHP_SESSION_NONE) {session_start();} ?>

	<div class="col-md-4 col-md-offset-4" >
		<h2 class="titulo">Crear cuenta</h2>
		<form method="POST" action="insertar.php" id="formregistro" name="registro">
			  <div class="form-group" >
			    <input type="text" class="form-control" id="nom" name="nombre" placeholder="Nombre" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}" required="required">
			  </div>

			  <div class="form-group" >
			    <input type="text" class="form-control" id="ape" name="apellido" placeholder="Apellido" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}" required="required">
			  </div>

			  <div class="form-group" >
			    <input type="text" class="form-control" id="usu" name="usuario" placeholder="Usuario" pattern="[a-zA-Z0-9]{4,20}" required="required">
			  </div>

			  <div class="form-group" >
			    <input type="email" class="form-control" id="email" name="email" placeholder="Email" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required="required">
			  </div>

			  <div class="form-group">
			    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" pattern="[A-Za-z0-9!?-]{4,10}" required="required">
			  </div>

			 <div class="form-group">
			    <input type="password" class="form-control" id="contrasena2" name="contrasena2" placeholder="Repita su contraseña" pattern="[A-Za-z0-9!?-]{4,10}" required="required">
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

</body>
</html>