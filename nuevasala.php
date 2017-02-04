<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Creación de sala nueva</title>


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
    
    <?php if (session_status() == PHP_SESSION_NONE) {session_start();} 
    $bbddpropietarios = mysqli_query($conexion, 'SELECT * FROM registro WHERE privilegios="2";');

    
    ?>

	<div class="col-md-4 col-md-offset-4" >
		<h2 class="titulo">Nueva sala</h2>
		<form method="POST" action="" id="formregistro" name="registro">
			  <div class="form-group" >
			    <input type="text" class="form-control" id="nom" name="nombre" placeholder="Nombre" required="required">
			  </div>

			  <div class="form-group" >
			    <input type="text" class="form-control" id="subtitulo" name="subtitulo" placeholder="Subtítulo" >
			  </div>

			  <div class="form-group" >
			    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" required="required">
			  </div>

			  <div class="form-group" >
			    <input type="text" class="form-control" id="url" name="url" placeholder="URL a la imagen" required="required">
			  </div>
            
            <label>Asignar a propietario</label>
			  <div class="form-group">
                            <select id="propietario" name="propietario" form="formregistro">
                              <option value="">No</option>
                            
                                <?php while($arraypropietarios = $bbddpropietarios -> fetch_assoc())
                                        {      
                                            echo('<option value="'.$arraypropietarios['usuario'].'">'.$arraypropietarios['usuario'].'</option>');
                                        }
                                ?>

                            </select> 
                </div>

			<button type="submit" id="butt" class="btn btn-default" name="nuevasala">Crear sala</button>
			 				
		</form>
	</div>
</div>
    
    <?php
    
    if (isset($_POST['nuevasala'])) {
        $nombre = mysqli_real_escape_string ($conexion, $_POST['nombre']); 
        $subtitulo = mysqli_real_escape_string ($conexion, $_POST['subtitulo']);
        $descripcion = mysqli_real_escape_string ($conexion, $_POST['descripcion']);
        $url = mysqli_real_escape_string ($conexion, $_POST['url']);   
        $propietario = mysqli_real_escape_string ($conexion, $_POST['propietario']);

        $query = "INSERT INTO salas (nombre, subtitulo, descripcion, urlimagen, propietario) VALUES ('$nombre','$subtitulo', '$descripcion', '$url','$propietario')";
        
        $ejecutar = mysqli_query($conexion, $query) or die('Hubo un error durante la creación de la sala: ' . mysqli_error($conexion));
            
    
        echo "<script> alert('La sala se creó correctamente');
					 window.open('index_cms.php','_self');  
					 </script>";
        
        }
        
    ?>
    
</body>
</html>