<?php 
    // Datos para hacer la conexion a nuestro servidor MySQL
    define("NOMBRE_SERVIDOR", "localhost");
    define("NOMBRE_USUARIO", "root");
    define("PASSWORD", "");
    define("NOMBRE_BD", "blog");
    
    // Rutas de el sitio Web
    define("SERVIDOR", "http://localhost/blog/");
    define("RUTA_ENTRADAS", SERVIDOR."entradas.php");
    define("RUTA_FAVORITOS", SERVIDOR."favoritos.php");
    define("RUTA_AUTORES", SERVIDOR."autores.php");
    define("RUTA_USUARIOS", SERVIDOR."usuarios.php");
    define("RUTA_LOGIN", SERVIDOR."login.php");
    define("RUTA_REGISTRO", SERVIDOR."registro.php");
    define("RUTA_REGISTRO_CORRECTO", SERVIDOR."registro-correcto.php");