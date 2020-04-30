<?php
    include_once 'app/Config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioUsuario.inc.php';
    include_once 'app/ValidadorRegistro.inc.php';
    
    $titulo = "Nueva Entrada del blog";
    
     include_once 'plantillas/documento-inicio.inc.php';
    include_once 'plantillas/navbar.inc.php';
?>

<div class="container text-center">
    <div class="jumbotron">
        <h1>Nueva Entrada</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form-nueva-entrada" role="form" method="post" action="<?php echo RUTA_NUEVA_ENTRADA; ?>"> 
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input id="titulo" type="text" class="form-control" name="titulo" placeholder="Ponle un titulo a esta entrada">
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input id="url" type="text" class="form-control" name="url" placeholder="Dereccion unica sin espacios para la entrada">
                </div>
                <div class="form-group">
                    <label for="contenido">Contenido</label>
                    <textarea id="contenido" class="form-control" rows="5" name="texto" placeholder="Escribe aquí tu articulo"></textarea>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="publicar" value="si">Marca este recuadro si quieres que la entrada se publique de inmediato
                    </label>
                </div>
                <br>
                <button type="submit" class="btn btn-default btn-primary" name="guardar">Guaradar Entrada</button>
            </form>
        </div>
    </div>
</div>

<?php
    include_once 'plantillas/documento-cierre.inc.php';
?>