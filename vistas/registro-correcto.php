<?php
    include_once 'app/Config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioUsuario.inc.php';
    include_once 'app/ValidadorRegistro.inc.php';
    include_once 'app/Usuario.inc.php';
    
    if(isset($_GET['nombre'])){
        $nombre = $_GET['nombre'];
    }
    
    $titulo = "!Registro-Correcto";
    
    include_once 'plantillas/documento-inicio.inc.php';
    include_once 'plantillas/navbar.inc.php';
?>

<div class="container">
    <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-ok-circle" data-hidden="true"></span> Registro Correcto
                        </div>
                        <div class="panel-body">
                            <P class="text-center">!Gracias por registrate <b><?php echo $nombre; ?>!</b>
                            <br><br>
                            <a href="<?php echo RUTA_LOGIN;?>">Inicia Sesión</a> Para hacer uso de tu cuenta
                            </P>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


<?php
    include_once 'plantillas/documento-cierre.inc.php';
?>