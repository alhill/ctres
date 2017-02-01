<?php

    include "config.php";
    $url = $_SERVER['REQUEST_URI'];
    $usuario = parse_url($url, PHP_URL_QUERY);
    mysqli_query($conexion, "DELETE FROM registro WHERE usuario='$usuario'") or die('Hubo un problema al borrar el usuario: ' . mysqli_error($conexion));
    header("Location: paneladmin.php");

?>