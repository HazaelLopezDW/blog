<?php
    include_once 'app/Config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioUsuario.inc.php';
    include_once 'app/EscritorEntradas.inc.php';
    
    $titulo = "blog De JavaDevOne";
    
    include_once 'plantillas/documento-inicio.inc.php';
    include_once 'plantillas/navbar.inc.php';
?>

<div class="container">
    <div class="jumbotron">
        <h1>Blog De JavaDevOne</h1>
        <p>Blog Dedicado a la programacion Web</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-search" data-hidden="true"></span> Buscar
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <input type="text" class="form-control" name="" placeholder="Pudes hacer mas de <?php echo $total; ?> busqueda!!!"> 
                            </div>
                            <button type="button" class="form-control" name="">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-filter" data-hidden="true"></span> Filtros
                        </div>
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-calendar" data-hidden="true"></span> Archivos
                        </div>
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
           <?php
                EscritorEntradas::escribir_entradas();
           ?>
        </div>
    </div>
</div>

<?php
    include_once 'plantillas/documento-cierre.inc.php';
?>
