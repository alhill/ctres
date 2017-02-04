<!-- Barra de usuario registrado -->
<style>
    .barra_usuario{
        padding: 0.5em 0 0.5em 0;
    }
    .barra_usuario a{
        color: black;
        padding: 0.5em;
        text-decoration: none;
        transition: 0.5s;
    }
    .barra_usuario a:hover{
        background: lightgray;
    }
    .barra_usuario li{
        list-style-type: none;
    }


</style>


<?php if (session_status() == PHP_SESSION_NONE) {session_start();} 
if (isset($_SESSION['usuario'])){
   ?>
    <header>
        <div class="row barra_usuario">
            <ul>
                <div class="col-md-2"><li><?php echo ("Bienvenido <b>" . $_SESSION['usuario'] . "</b>"); ?></li></div>
                <div class="col-md-2"><li><a href='index.php'>Lista de salas</a></li></div>
                <div class="col-md-2"><li><a href="calendario_index.php">Reservas</a></li></div>
                
                <div class="col-md-2"><li><a href="<?php 
        if ($_SESSION['privilegios']>1)
        {
            echo('paneladmin.php');
        }
        else
        {
            echo('panelusuario.php');
        }
                    ?>">Panel de usuario</a></li></div>
                <div class="col-md-2"><li><a href="logout.php">Cerrar sesión</a></li></div>
            </ul>
        </div>
    </header>
    <?php
}
?>

