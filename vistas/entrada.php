<?php
    include_once 'app/Config.inc.php';
    include_once 'app/Conexion.inc.php';
    
    include_once 'app/Usuario.inc.php';
    include_once 'app/Entrada.inc.php';
    include_once 'app/Comentario.inc.php';
    
    include_once 'app/RepositorioUsuario.inc.php';
    include_once 'app/RepositorioEntrada.inc.php';
    include_once 'app/RepositorioComentario.inc.php';
    
    $titulo = $entrada -> obtener_titulo();
    
    include_once 'plantillas/documento-inicio.inc.php';
    include_once 'plantillas/navbar.inc.php';    
?>

<div class="container contenido-articulo">
    <div class="row">
        <div class="col-md-12">
            <h1>
                <?php
                    echo $entrada -> obtener_titulo();
                ?>
            </h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <p>
                Por:
                <a href="#">
                    <span class="glyphicon glyphicon-user" data-hidden="true"></span><?php echo $autor -> obtener_nombre(); ?>
                </a>
                El: 
                <?php
                    echo $entrada -> Obtener_fecha();
                ?>
            </p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <article class="text-justify">
                <?php
                    echo nl2br($entrada -> obtener_texto());
                ?>
            </article>
        </div>
    </div>
</div>

<?php
    include_once 'plantillas/documento-cierre.inc.php';
?>
