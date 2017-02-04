<?php include "config.php" ?>

<!DOCTYPE html>

<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/reset.css" type="text/css" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="js/script.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	
	<title>C3PO</title>
</head>

<body>
     <div id="loginmodal" class="modal fade" role="dialog">
        <div class="loginventana">
            <p><b>Acceso a la zona de usuarios</b></p>
            <form action="login.php" method="POST" name="formlog" id="formlog">
                <table>
                    <tr>
                        <td><p class="textoform">Usuario:</td> 
                        <td><input type="text" name="usuario" required /></td>
                    </tr>
                    <tr>
                        <td><p class="textoform">Contraseña:&nbsp;&nbsp;</td>
                        <td><input type="password" name="contrasena" required /></td>
                    </tr>
                </table><br>
                <button type="submit">Enviar</button>
            </form>
            <br>
            <a class="lanzamodal2">Olvidaste la contraseña?</a><br>
            <a href="registro.php">Todavía no estás registrado?</a>
        </div>
    </div>
    
    <input type="button" value="Acceso de usuarios" onclick="$('#loginmodal').modal();">
    
</body>
    
</html>