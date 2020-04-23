<?php
    include_once 'Config.inc.php';
    include_once 'Conexion.inc.php';
    include_once 'Comentario.inc.php';
    
    class RepositorioComentario{
        
        public static function insertar_comentario($conexion, $comentario){
            $insertar_comentario = null;
            
            $autor_id = $comentario -> obtener_autor_id();
            $entrada_id = $comentario -> obtener_entrada_id();
            $titulo = $comentario -> obtener_titulo();
            $texto = $comentario -> obtener_texto();
            
            if(isset($conexion)){
                try{
                    
                    $sql = "INSERT INTO comentarios(autor_id, entrada_id, titulo, texto, fecha) VALUES(:autor_id, :entrada_id, :titulo, :texto, NOW())";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> bindParam(":autor_id", $autor_id, PDO::PARAM_STR);
                    $sentencia -> bindParam(":entrada_id", $entrada_id, PDO::PARAM_STR);
                    $sentencia -> bindParam(":titulo", $titulo, PDO::PARAM_STR);
                    $sentencia -> bindParam(":texto", $texto, PDO::PARAM_STR);
                    
                    $insertar_comentario = $sentencia -> execute();
                } catch (PDOException $ex) {
                    print "ERROR:" . $ex -> getMessage() . "<br>";
                }
            }
            return $insertar_comentario;
        }
        
        public static function obtener_comentarios($conexion, $entrada_id){
            $comentarios = [];
            if(isset($conexion)){
                try{
                    include_once 'Comentario.inc.php';
                    
                    $sql = "SELECT * FROM comentarios WHERE entrada_id = :entrada_id";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> bindParam(":entrada_id", $entrada_id, PDO::PARAM_STR);
                    $sentencia -> execute();
                    
                    $resultado = $sentencia -> fetchAll();
                    if(count($resultado)){
                        foreach ($resultado as $fila){
                            $comentarios[] = new Comentario($fila['id'], $fila['autor_id'], $fila['entrada_id'], $fila['titulo'], $fila['texto'], 
                                    $fila['fecha']);
                        }
                    }
                } catch (PDOException $ex) {
                    print "ERROR:" . $ex -> getMessage() . "<br>";
                }
            }
            return $comentarios;
        }
    }
