<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido</title>

	<!--HOJA CSS-->
	<link rel="stylesheet" type="text/css" href="estilo.css">

	<!--BOOTSTRAP-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>
<body>

<div class="row" id="inicio">
    


	<div class="col-md-4 col-md-offset-1" id="cliente" >
		<h2 class="titulo">Ya soy usuario - Acceder</h2>
		
		<form method="POST" action="login.php">

			  <div class="form-group" >
			    <input type="text" class="form-control" id="user" name="usuario" placeholder="Escriba su usuario">
			  </div>

			  <div class="form-group">
			    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Escriba su contraseña">
			  </div>

			  <!--<div class="checkbox">
			    <label><input type="checkbox"> Recuerdame</label>
			  </div>-->

			  <button type="submit" id="butt" class="btn btn-default" name="log">Acceder</button>
		</form>
	</div>

	<div class="col-md-4 col-md-offset-2" id="nocliente" >
		<h2 class="titulo">Soy nueva@ - Quiero registrarme</h2>
			<p>Al crear tu cuenta, podrás realizar acceder a las reservas de forma más rápida</p>
			  <a href="registro.php" id="butt" class="btn btn-default">Crear cuenta</a>		
	</div>
</div>


</body>
</html>

	