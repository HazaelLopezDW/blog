<?php
    include_once 'app/Config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/Entrada.inc.php';
    
    class RepositorioEntrada{
        
        public static function insertar_entrada($conexion, $entrada){
            $insertar_entrada = null;
            
            $autor_id = $entrada -> obtener_autor_id();
            $titulo = $entrada -> obtener_titulo();
            $texto = $entrada -> obtener_password();
            
            if(isset($conexion)){
                try{
                    
                    $sql = "INSERT INTO entradas(autor_id, titulo, texto, fecha, activa) VALUES(:autor_id, :titulo, :texto, NOW(), 0)";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> bindParam(":autor_id", $autor_id, PDO::PARAM_STR);
                    $sentencia -> bindParam(":titulo", $titulo, PDO::PARAM_STR);
                    $sentencia -> bindParam(":texto", $texto, PDO::PARAM_STR);
                    
                    $insertar_entrada = $sentencia -> execute();
                } catch (PDOException $ex) {
                    print "ERROR:" . $ex -> getMessage() . "<br>";
                }
            }
            return $insertar_entrada;
        }
    }
