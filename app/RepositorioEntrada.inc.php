<?php
    include_once 'Config.inc.php';
    include_once 'Conexion.inc.php';
    include_once 'Entrada.inc.php';
    
    class RepositorioEntrada{
        
        public static function insertar_entrada($conexion, $entrada){
            $insertar_entrada = null;
            
            $autor_id = $entrada -> obtener_autor_id();
            $titulo = $entrada -> obtener_titulo();
            $texto = $entrada -> obtener_texto();
            
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
        
        public static function obtener_todas_por_fecha_descendiente($conexion){
            $entradas = [];
            
            if(isset($conexion)){
                try{
                    $sql = "SELECT * FROM entradas ORDER BY fecha DESC";
                    $sentencia = $conexion -> prepare();
                    $sentencia -> execute();
                    
                    $resultado = $sentencia -> fetchAll();
                    
                    if(count($resultado)){
                        foreach ($sentencia as $fila){
                            $entradas[] = new Entradra($fila['id'], $fila['autor_id'], $fila['titulo'], $fila['texto'], $fila['fecha'], $fila['activa']);
                        }
                    }
                } catch (PDOException $ex) {
                    print "ERROR:" . $ex -> getMessage() . "<br>";
                }
            }
            return $entradas;
        }
    }
