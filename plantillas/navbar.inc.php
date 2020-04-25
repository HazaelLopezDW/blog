<?php
include_once 'app/ControlSesion.inc.php';
include_once 'app/Config.inc.php';

    Conexion::abrir_conexion();
    $total = RepositorioUsuario::obtener_numero_usuarios(Conexion::obtener_conexion());
?>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> 
                <span class="sr-only">Menu de Navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo SERVIDOR; ?>" class="navbar-brand">JavaDevOne</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php
                if(!ControlSesion::sesion_iniciada()){
            ?>        
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo RUTA_ENTRADAS; ?>"><span class="glyphicon glyphicon-th-list" data-hidden="true"></span> Entradas</a></li>
                        <li><a href="<?php echo RUTA_FAVORITOS; ?>"><span class="glyphicon glyphicon-star" data-hidden="true"></span> Favoritos</a></li>
                        <li><a href="<?php echo RUTA_AUTORES; ?>"><span class="glyphicon glyphicon-education" data-hidden="true"></span> Autores</a></li>
                    </ul>
            <?php
                }
            ?>    
            <ul class="nav navbar-nav navbar-right">
                <?php
                    if(ControlSesion::sesion_iniciada()){
                ?>
                <li><a href="#"><span class="glyphicon glyphicon-user" data-hidden="true"></span><?php echo " " . $_SESSION['nombre_usuario']; ?></a></li>
                <li><a href="<?php echo RUTA_GESTOR; ?>"><span class="glyphicon glyphicon-dashboard" data-hidden="true"></span>Gestor</a></li>
                <li><a href="<?php echo RUTA_LOGOUT; ?>"><span class="glyphicon glyphicon-log-out" data-hidden="true"></span> Cerrar Sesión</a></li>
                <?php
                    }else{
                ?>
                <li><a href="<?php echo RUTA_USUARIOS; ?>"><span class="glyphicon glyphicon-user" data-hidden="true"></span> <?php echo $total; ?></a></li>
                <li><a href="<?php echo RUTA_LOGIN; ?>"><span class="glyphicon glyphicon-log-in" data-hidden="true"></span> Iniciar Sesión</a></li>
                <li><a href="<?php echo RUTA_REGISTRO; ?>"><span class="glyphicon glyphicon-plus" data-hidden="true"></span> Registro</a></li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>
