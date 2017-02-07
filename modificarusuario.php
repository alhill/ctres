<?php include 'config.php';

    $url = $_SERVER['REQUEST_URI'];
    $usuario = parse_url($url, PHP_URL_QUERY);
    if (session_status() == PHP_SESSION_NONE) {session_start();}

    if (
        (!isset($_SESSION['privilegios']))
        || 
                (isset($_SESSION['privilegios']) 
                && 
                ($_SESSION['privilegios'] == 1 || $_SESSION['privilegios'] == 2) 
                && 
                ($_SESSION['usuario'] != $usuario))
        )
    {
        die();
    }




?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificación de usuarios</title>


	<!--HOJA CSS-->
	<link rel="stylesheet" type="text/css" href="estilo.css">

	<!--BOOTSTRAP-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">


</head>
<body>

<div class="row" id="registro">
    
<?php 
      
    include "header.php";
    $url = $_SERVER['REQUEST_URI'];
    $usuario = parse_url($url, PHP_URL_QUERY);
    $resultado = mysqli_query($conexion, "SELECT * FROM registro WHERE usuario='$usuario'");
    $row = mysqli_fetch_assoc($resultado);
    
?>

	<div class="col-md-4 col-md-offset-4" >
		<h2 class="titulo">Modificación de usuario</h2>
		<form method="POST" action="<?php echo('modificar.php?' . $usuario); ?>"  id="formregistro" name="registro">
			  <div class="form-group" >
			    <input type="text" class="form-control" id="nom" name="nombre" value="<?php echo($row["nombre"]); ?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}" required="required">
			  </div>

			  <div class="form-group" >
			    <input type="text" class="form-control" id="ape" name="apellido" value="<?php echo($row["apellido"]); ?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}" required="required">
			  </div>

			  <div class="form-group" >
			    <input type="text" class="form-control" id="usu" name="usuario" value="<?php echo($row["usuario"]); ?>" pattern="[a-zA-Z0-9]{4,20}" required="required" disabled>
			  </div>

			  <div class="form-group" >
			    <input type="email" class="form-control" id="email" name="email" value="<?php echo($row["email"]); ?>" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required="required">
			  </div>

			  <div class="form-group">
			    <input type="password" class="form-control" id="contrasena" name="contrasena" pattern="[A-Za-z0-9!?-]{4,6}" required="required">
			  </div>

			 <div class="form-group">
			    <input type="password" class="form-control" id="contrasena2" name="contrasena2" pattern="[A-Za-z0-9!?-]{4,6}" required="required">
			  </div>
            
            <?php
                $elegida1 = "";
                $elegida2 = "";
                $elegida3 = "";
                if($row["privilegios"]==1){$elegida1="selected"; }
                if($row["privilegios"]==2){$elegida2="selected";}
                if($row["privilegios"]==3){$elegida3="selected";}
            ?>
            
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
  
			<button type="submit" id="butt" class="btn btn-default" name="modificar">Modificar usuario</button>

			 				
		</form>
	</div>
</div>

</body>
</html>