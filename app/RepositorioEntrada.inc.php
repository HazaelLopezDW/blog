<?php
    include_once 'app/Config.inc.php';
    include_once 'app/Conexion.inc.php';
    include_once 'app/Entrada.inc.php';
    
    class RepositorioEntrada{
        
        public static function insertar_entrada($conexion, $entrada){
            $insertar_entrada = null;
            
            if(isset($conexion)){
                try{
                    
                    $sql = "INSERT INTO usuarios(nombre, email, password, fecha_registro, activo) VALUES(:nombre, :email, :password, NOW(), 0)";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> bindParam(":nombre", $usrNom, PDO::PARAM_STR);
                    $sentencia -> bindParam(":email", $usrEmail, PDO::PARAM_STR);
                    $sentencia -> bindParam(":password", $usrpassword, PDO::PARAM_STR);
                    
                    $insertar_entrada = $sentencia -> execute();
                } catch (PDOException $ex) {
                    print "ERROR:" . $ex -> getMessage() . "<br>";
                }
            }
            return $insertar_entrada;
        }
    }
