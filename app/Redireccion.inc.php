<?php
    class Redireccion{
        
        //Creamos la funcion para hacer la redireccion a nuestra pagína de bienvenida
        public static function redirigir($url){
            header("Location:" . $url, true, 301);
            die();
        }
    }