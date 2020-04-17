<?php
    $componentes_url = parse_url($_SERVER['REQUEST_URI']);
    
    $ruta = $componentes_url['path'];
    
    $partes_ruta = explode("/", $ruta);
    $partes_ruta = array_filter($partes_ruta);
    $partes_ruta = array_slice($partes_ruta, 0);
    
    /*
    echo "partes_ruta[0] -> " . $partes_ruta[0] . "<br>";
    echo "partes_ruta[1] -> " . $partes_ruta[1] . "<br>";
    echo "partes_ruta[2] -> " . $partes_ruta[2] . "<br>";
    echo "partes_ruta[3] -> " . $partes_ruta[3] . "<br>";
    echo "partes_ruta[4] -> " . $partes_ruta[4] . "<br>"; 
    */
    
    $ruta_elegida = "vistas/error404.php" ;
    
    if($partes_ruta[0] === "blog"){
        if(count($partes_ruta) == 1){
            $ruta_elegida = "vistas/home.php";
        }else if(count($partes_ruta) == 2){
            switch ($partes_ruta[1]) {
                case "login":
                    $ruta_elegida = "vistas/login.php";
                    break;
                
                case "logout":
                    $ruta_elegida = "vistas/logout.php";
                    break;
                
                case "registro":
                    $ruta_elegida = "vistas/registro.php";
                    break;
            }
        }else if(count($partes_ruta) == 3){
            if($partes_ruta[1] == "registro-correcto"){
                $nombre = $partes_ruta[2];
                $ruta_elegida = "vistas/registro-correcto.php";
            }
        }
    }
    
    include_once $ruta_elegida;
    
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
    
    