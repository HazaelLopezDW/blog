<?php
    include_once 'app/Config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioUsuario.inc.php';
    include_once 'app/ValidadorRegistro.inc.php';
    include_once 'app/Usuario.inc.php';
    
    if(isset($_POST['enviar'])){
        Conexion::abrir_conexion();
        
        $validador = new ValidadorRegistro($_POST['nombre'], $_POST['email'], $_POST['clave1'], $_POST['clave2'], Conexion::obtener_conexion());
        
        if($validador -> registro_valido()){
            // Tememos que insertar el usuario 
            $usuario = new Usuario("", $validador -> obtener_nombre(), $validador -> obtener_email(), password_hash($validador -> obtener_clave(),
                    PASSWORD_DEFAULT), "", "");
            
            if(RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario)){
                echo "Usuarios insertado <br>";
            }
        }
        
        Conexion::cerrar_conexion();
    }
    
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
