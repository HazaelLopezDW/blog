<?php 
    // Datos para hacer la conexion a nuestro servidor MySQL
    define("NOMBRE_SERVIDOR", "localhost");
    define("NOMBRE_USUARIO", "root");
    define("PASSWORD", "");
    define("NOMBRE_BD", "blog");
    
    // Rutas de el sitio Web
    define("SERVIDOR", "http://localhost/blog/");
    define("RUTA_ENTRADAS", SERVIDOR."entradas");
    define("RUTA_FAVORITOS", SERVIDOR."favoritos");
    define("RUTA_AUTORES", SERVIDOR."autores");
    define("RUTA_USUARIOS", SERVIDOR."usuarios");
    define("RUTA_LOGIN", SERVIDOR."login");
    define("RUTA_REGISTRO", SERVIDOR."registro");
    define("RUTA_REGISTRO_CORRECTO", SERVIDOR."registro-correcto");
    
    //Recursos
    define("RUTA_CSS", SERVIDOR."/css/");
    define("RUTA_JS", SERVIDOR."/js/");