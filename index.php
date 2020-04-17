<?php
    $componentes_url = parse_url($_SERVER['REQUEST_URI']);
    
    $ruta = $componentes_url['path'];
    
    $partes_ruta = explode("/", $ruta);
    
    /*
    echo "partes_ruta[0] -> " . $partes_ruta[0] . "<br>";
    echo "partes_ruta[1] -> " . $partes_ruta[1] . "<br>";
    echo "partes_ruta[2] -> " . $partes_ruta[2] . "<br>";
    echo "partes_ruta[3] -> " . $partes_ruta[3] . "<br>";
    echo "partes_ruta[4] -> " . $partes_ruta[4] . "<br>"; 
    */
    
    if($partes_ruta[2] === "registro"){
        include_once 'vistas/registro.php';
    }else if($partes_ruta[2] === "login"){
        include_once 'vistas/login.php';
    }else if($partes_ruta[1] === "blog"){
        include_once 'vistas/home.php';
    }else{
        echo "404";
    }
    
    
    
    /*
    if($partes_ruta[3] === "registro"){
        include_once 'vistas/registro.php';
    }else if($partes_ruta[3] === "login"){
        include_once 'vistas/login.php';
    }else if($partes_ruta[3] === "script-relleno"){
        include_once  'herramientas/script-relleno.php';
    }else if($partes_ruta[2] === "blog"){
        include_once 'vistas/home.php';
    }else{
        echo "404";
    }
    */
    
    