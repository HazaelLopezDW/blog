<?php
    include_once 'app/Config.inc.php';
    include_once 'app/Conexion.inc.php';
    
    include_once 'app/Usuario.inc.php';
    include_once 'app/Entrada.inc.php';
    include_once 'app/Comentario.inc.php';
    
    include_once 'app/RepositorioUsuario.inc.php';
    include_once 'app/RepositorioEntrada.inc.php';
    include_once 'app/RepositorioComentario.inc.php';
    
    echo $entrada -> obtener_titulo();
    echo "<br>";
    echo $entrada -> obtener_texto();
