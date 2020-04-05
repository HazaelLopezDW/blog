<?php
    class RepositorioUsuario{
        
        public static function obtener_todos($conexion){
            $total_usuarios = array();
            
            if(isset($conexion)){
                try{
                    include_once 'Usuario.inc.php';
                    
                    $sql = "SELECT * FROM usuarios";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> execute();
                    
                    $resultado = $sentencia -> fetchAll();
                    
                    if(count($resultado)){
                        foreach ($resultado as $filas){
                            $total_usuarios[] = new Usuario($fila['id'], $fila['nombre'], $fila['email'], $fila['password'], $fila['fecha_registro'], 
                                    $fila['activo']);
                        }
                    }else{
                        print "No hay Usuarios que mostrar <br>";
                    }
                } catch (PDOException $ex) {
                    print "ERROR:" . $ex -> getMessage() . "<br>";
                }
            }
            return $total_usuarios;
        }
        
        
        public static function obtener_numero_usuarios($conexion){
            $total_usuarios = null;
            
            if(isset($conexion)){
                try{
                    
                    $sql = "SELECT COUNT(*) as total FROM usuarios";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> execute();
                    $resultado = $sentencia -> fetch();
                    
                    $total_usuarios = $resultado['total'];
                } catch (PDOException $ex) {
                    print "ERROR:" . $ex -> getMessage() . "<br>";
                }
            }
            return $total_usuarios;
        }
        
        public static function nombre_existe($conexion, $nombre){
            $nombre_existe = false;
            
            if(isset($conexion)){
                try{
                    
                    $sql = "SELECT * FROM usuarios WHERE nombre = :nombre";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> bindParam(":nombre", $nombre, PDO::PARAM_STR);
                    $sentencia -> execute();
                    
                    $nombre_existe = $sentencia -> fetchAll();
                } catch (PDOException $ex) {
                    print "ERROR:" . $ex -> getMessage() . "<br>";
                }
            }
            return $nombre_existe;
        }
        
        public static function email_existe($conexion, $email){
            $email_existe = false;
            
            if(isset($conexion)){
                try{
                    
                    $sql = "SELECT * FROM usuarios WHERE email = :email";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> bindParam(":email", $email, PDO::PARAM_STR);
                    $sentencia -> execute();
                    
                    $email_existe = $sentencia -> fetchAll();
                } catch (PDOException $ex) {
                    print "ERROR:" . $ex -> getMessage() . "<br>";
                }
            }
            return $email_existe;
        }
    }

    
    
    
    
    
    
    
    
    
    
    