<?php
    include_once 'app/Config.inc.php';
    
    $titulo = "Registro";
    
    include_once 'plantillas/documento-inicio.inc.php';
    include_once 'plantillas/navbar.inc.php';
?>
<div class="container">
    <div class="jumbotron">
        <h1>Formulario De Registro</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 text-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Instrucciones
                            </h3>
                        </div>
                        <div class="panel-body">
                            <p class="text-justify">
                                Para uniter al blog de javaDevone introducce un 
                                nombre de usuario tu email y una contraseña el 
                                email que escribas tiene que ser real ya que lo 
                                nesisitaras para gestionar tu cuenta te 
                                recomendamos una contraseña que contega letras 
                                numero y simbolos
                            </p>
                            <br>
                            <a href="#">¿Ya tienes cuenta?</a>
                            <br><br>
                            <a href="#">¿Olvidaste tu cuenta?</a>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Ingresa tus datos
                            </h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <?php
                                    if(isset($_POST['enviar'])){
                                        include_once 'plantillas/registro-validado.inc.php';
                                    }else{
                                        include_once 'plantillas/registro-vacio.inc.php';
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include_once 'plantillas/documento-cierre.inc.php';
?>
