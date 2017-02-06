
<nav class="navbar menu_header">
    <div class="menu_header">
            <div class="navbar-header">
               <img src="logo_peq.png" class="logo_menu">
            </div>
                
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="calendario_index.php">Reservas</a></li>
                <li><a href="proyecto.php">Proyecto</a></li>
                <li><a href="equipo.php">Equipo CTRES</a></li>
                <?php 
                    if (session_status() == PHP_SESSION_NONE) {session_start();} 
                    if (isset($_SESSION['usuario'])){
                        echo ('<li><a href="');
                        if ($_SESSION['privilegios']>1)
                        {
                            echo('paneladmin.php');
                        }
                        else
                        {
                            echo('panelusuario.php');
                        }
                    echo ('">Bienvenido <b>' . $_SESSION['usuario'] . '</b></li><li><a href="logout.php">Cerrar sesión</a></li>');
                    }
                    else{
                        ?>
                        <li><a href="registro.php"><span class="glyphicon glyphicon-user"></span> Registrate</a></li>
                        <li><a href="pagina_login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <?php
                    }
                ?>
            
                
            </ul>
    </div>
</nav>

