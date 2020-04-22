<?php
    include_once 'app/Config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioUsuario.inc.php';
    include_once 'app/ValidadorRegistro.inc.php';
    include_once 'app/Usuario.inc.php';
    include_once 'app/ValidadorLogin.inc.php';
    include_once 'app/ControlSesion.inc.php';
    include_once 'app/Redireccion.inc.php';
    
    if(ControlSesion::sesion_iniciada()){
        Redireccion::redirigir(SERVIDOR);
    }
    
    if(isset($_POST['login'])){
        Conexion::abrir_conexion();
        
        $validador = new ValidadorLogin($_POST["email"], $_POST["clave"], Conexion::obtener_conexion());
        
        if($validador -> obtener_error() === "" && !is_null($validador -> obtener_usuario())){
            // Iniciar la session
            ControlSesion::iniciar_sesion($validador -> obtener_usuario() -> obtener_id(), $validador -> obtener_usuario() -> obtener_nombre());
            // Madariamos al usuario a index
            Redireccion::redirigir(SERVIDOR);
        }
        
        Conexion::cerrar_conexion();
    }
    
    $titulo = "Login";
    
    include_once 'plantillas/documento-inicio.inc.php';
    include_once 'plantillas/navbar.inc.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center">
                        Iniciar Sesión
                    </h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo RUTA_LOGIN; ?>">
                        <h2>Introduce tus datos</h2>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input id="email" type="email" class="form-control" placeholder="Email Del usuairo" name="email" 
                                   <?php
                                        if(isset($_POST['login']) && isset($_POST['email']) && !empty($_POST['email'])){
                                            echo "value='" . $_POST['email'] . "'";
                                        }
                                   ?>
                                   required="" autofocus="">
                            <br>
                            <label for="clave" class="sr-only">Contraseña</label>
                            <input id="clave" type="password" class="form-control" placeholder="Contraseña de usuario" name="clave" 
                                   
                                   required="">
                            <br>
                            <?php
                                if(isset($_POST['login'])){
                                    $validador -> mostrar_error();
                                }
                            ?>
                            <button type="submit" class="btn btn-lg btn-block btn-primary" name="login">Iniciar Sesión</button>
                        </div>
                    </form>
                    <div class="text-center">
                        <a href="#"> ¿Olvidades tu contraseña</a>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>


<?php
    include_once 'plantillas/documento-cierre.inc.php';
?>
