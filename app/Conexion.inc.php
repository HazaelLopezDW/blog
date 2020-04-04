<?php 
    class Conexion{
        
        private static $conexion;
        
        public static function abrir_conexion(){
            if(!isset(self::$conexion)){
                try{
                    include_once 'Config.inc.php';
                    
                    self::$conexion = new PDO("mysql:host=".NOMBRE_SERVIDOR."; dbname=".NOMBRE_BD, NOMBRE_USUARIO, PASSWORD);
                    self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    self::$conexion -> exec("SET CHARACTER SET utf8");
                    
                    // print "Conexion abierta <br>";
                } catch (PDOException $ex) {
                    print "ERROR:" . $ex -> getMessage() . "<br>";
                }
            }
        }
        
        public static function cerrar_conexion(){
            if(isset(self::$conexion)){
                try{
                    self::$conexion = null;
                    // print "Conexion cerrada <br>";
                } catch (PDOException $ex) {
                    print "ERROR:" . $ex -> getMessage() . "<br>";
                }
            }
        }
        
        public static function obtener_conexion(){
            return self::$conexion;
        }
    }
