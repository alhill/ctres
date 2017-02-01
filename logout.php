<?php
    include 'config.php';
    session_start();
    
    if (!isset($_SESSION['usuario'])){
        header('Location: index.php');
    }

    echo ("Cerrando sesión...");

    unset($_SESSION['usuario']);
    session_destroy();
    mysqli_close();

    header('Location: index.php');
       
?>