<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido</title>



	<!--BOOTSTRAP-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!--HOJA CSS-->
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    
    <?php
    
    include 'header.php';
    if (session_status() == PHP_SESSION_NONE) {session_start();}
    if (isset($_SESSION['privilegios']) && $_SESSION['privilegios'] > 0){
        header('Location: calendario_index.php');
    } 
    
    ?>
    
<div class="row" id="inicio">	

	<div class="col-md-4 col-md-offset-1" id="cliente" >
		<h2 class="titulo">Ya soy usuario - Acceder</h2>
		
		<form method="POST" action="login.php">



			  <div class="form-group" >
			    <input  type="text" class="form-control" id="user" name="usuario" placeholder="Escriba su usuario">
			  </div>

			  <div class="form-group">
			    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Escriba su contraseña">
			  </div>

			   <button  class="btn btn-mio1" type="submit" id="butt" class="btn btn-default" name="log">Acceder</button>
			   <p><a href="recuperar_pass.<?php?>">Recuperar cuenta</a></p> <br>
		</form>
	</div>

	<div class="col-md-4 col-md-offset-2" id="nocliente" >
		<h2 class="titulo">Soy nuev@ - Quiero registrarme</h2>
			<p>Al crear tu cuenta, podrás acceder y realizar reservas de salas o materiales de forma más rápida</p>
			  <a  href="registro.php" id="butt" class="btn btn-mio1">Crear cuenta</a><br>	
	</div>
</div>

 <?php include 'footer.php'; ?>
</body>
</html>

	