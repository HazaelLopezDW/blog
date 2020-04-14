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
                    
                    $sql = "INSERT INTO comentario(autor_id, titulo, entrada_id, texto, fecha) VALUES(:autor_id, :entrada_id, :titulo, :texto, NOW())";
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
    }
