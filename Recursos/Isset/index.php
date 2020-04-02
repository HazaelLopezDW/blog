<?php
    
    $no_inicializada;
    $nula = null;
    $definida = "";
    $tiene_texto = "Hola";
    
    echo "FUNCTION ISSET() TABLA DE LA VERDAD <BR>";
    if(isset($no_inicializada)){
        echo "no_Inicializada es True <br>";
    }else{
        echo "no_Inicializada es False <br>";
    }
    
    if(isset($nula)){
        echo "nula es True <br>";
    }else{
        echo "nula es False <br>";
    }
    
    if(isset($definida)){
        echo "Definida es True <br>";
    }else{
        echo "Definida es False <br>";
    }
    
    if(isset($tiene_texto)){
        echo "tiene_texto es True <br>";
    }else{
        echo "tiene_texto es False <br>";
    }
    
    echo "<br><br>";
    
    echo "FUNCTION EMPTY() TABLA DE LA VERDAD <BR>";
    if(empty($no_inicializada)){
        echo "no_Inicializada es True <br>";
    }else{
        echo "no_Inicializada es False <br>";
    }
    
    if(empty($nula)){
        echo "nula es True <br>";
    }else{
        echo "nula es False <br>";
    }
    
    if(empty($definida)){
        echo "Definida es True <br>";
    }else{
        echo "Definida es False <br>";
    }
    
    if(empty($tiene_texto)){
        echo "tiene_texto es True <br>";
    }else{
        echo "tiene_texto es False <br>";
    }
    
    
    echo "FUNCTION IS_NULL() TABLA DE LA VERDAD <BR>";
    if(is_null($no_inicializada)){
        echo "no_Inicializada es True <br>";
    }else{
        echo "no_Inicializada es False <br>";
    }
    
    if(is_null($nula)){
        echo "nula es True <br>";
    }else{
        echo "nula es False <br>";
    }
    
    if(is_null($definida)){
        echo "Definida es True <br>";
    }else{
        echo "Definida es False <br>";
    }
    
    if(is_null($tiene_texto)){
        echo "tiene_texto es True <br>";
    }else{
        echo "tiene_texto es False <br>";
    }
?>