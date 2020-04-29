<?php
    include_once 'Config.inc.php';
    include_once 'Conexion.inc.php';
    include_once 'Entrada.inc.php';
    
    class RepositorioEntrada{
        
        public static function insertar_entrada($conexion, $entrada){
            $insertar_entrada = null;
            
            $autor_id = $entrada -> obtener_autor_id();
            $url = $entrada -> obtener_url();
            $titulo = $entrada -> obtener_titulo();
            $texto = $entrada -> obtener_texto();
            
            if(isset($conexion)){
                try{
                    
                    $sql = "INSERT INTO entradas(autor_id, url, titulo, texto, fecha, activa) VALUES(:autor_id, :url, :titulo, :texto, NOW(), 0)";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> bindParam(":autor_id", $autor_id, PDO::PARAM_STR);
                    $sentencia -> bindParam(":url", $url, PDO::PARAM_STR);
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
                    $sql = "SELECT * FROM entradas ORDER BY fecha DESC LIMIT 5";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> execute();
                    
                    $resultado = $sentencia -> fetchAll();
                   
                    if(count($resultado)){
                        
                        foreach ($resultado as $fila){
                            $entradas[] = new Entrada($fila['id'], $fila['autor_id'], $fila['url'], $fila['titulo'], $fila['texto'], $fila['fecha'], 
                                    $fila['activa']);
                        }
                    }
                } catch (PDOException $ex) {
                    print "ERROR:" . $ex -> getMessage() . "<br>";
                }
            }
            return $entradas;
        }
        
        public static function obtener_entrada_por_url($conexion, $url){
            $entrada = null;
            if(isset($conexion)){
                try{
                    $sql = "SELECT * FROM entradas WHERE url LIKE :url";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> bindParam(":url", $url, PDO::PARAM_STR);
                    $sentencia -> execute();
                    
                    $resultado = $sentencia -> fetch();
                    
                    if(!empty($resultado)){
                        $entrada = new Entrada($resultado['id'], $resultado['autor_id'], $resultado['url'], $resultado['titulo'], $resultado['texto'],
                                $resultado['fecha'], $resultado['activa']);
                    }
                } catch (PDOException $ex) {
                    print "ERROR:" . $ex -> getMessage() . "<br>";
                }
            }
            return $entrada;
        }
        
        public static function obtener_entradas_al_azar($conexion, $limite){
            $entradas =  [];
            if(isset($conexion)){
                try{
                    $sql = "SELECT * FROM entradas ORDER BY RAND() LIMIT $limite";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> execute();
                    $resultado = $sentencia -> fetchAll();
                    
                    if(count($resultado)){
                        foreach ($resultado as $fila){
                            $entradas[] = new Entrada($fila['id'], $fila['autor_id'], $fila['url'], $fila['titulo'], $fila['texto'], $fila['fecha'], 
                                    $fila['activa']);
                        }
                    }
                } catch (PDOException $ex) {
                    print "ERROR:" . $ex -> getMessage() . "<br>";
                }
            }
            return $entradas;
        }
        
        public static function contar_entradas_activas_usuario($conexion, $id_usuario){
            $total_entradas = "0";
            
            if(isset($conexion)){
                try{
                    $sql = "SELECT COUNT(*) as total_entradas FROM entradas WHERE autor_id = :autor_id AND activa = 1";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> bindParam(":autor_id", $id_usuario, PDO::PARAM_STR);
                    $sentencia -> execute();
                    
                    $resultado = $sentencia -> fetch();
                    
                    if(!empty($resultado)){
                        $total_entradas = $resultado["total_entradas"];
                    }
                } catch (PDOException $ex) {
                    print "ERROR:" . $ex -> getMessage() . "<br>";
                }
            }
            return $total_entradas;
        }
        
        public static function contar_entradas_inactivas_usuario($conexion, $id_usuario){
            $total_entradas = "0";
            
            if(isset($conexion)){
                try{
                    $sql = "SELECT COUNT(*) as total_entradas FROM entradas WHERE autor_id = :autor_id AND activa = 0";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> bindParam(":autor_id", $id_usuario, PDO::PARAM_STR);
                    $sentencia -> execute();
                    
                    $resultado = $sentencia -> fetch();
                    
                    if(!empty($resultado)){
                        $total_entradas = $resultado["total_entradas"];
                    }
                } catch (PDOException $ex) {
                    print "ERROR:" . $ex -> getMessage() . "<br>";
                }
            }
            return $total_entradas;
        }
        
        public static function obtener_entradas_usuario_fecha_descendente($conexion, $id_usuario){
            $entradas_obtenidas =  [];
            if(isset($conexion)){
                try{
                    $sql = "SELECT a.id, a.autor_id, a.url, a.titulo, a.texto, a.fecha, a.activa, COUNT(b.id) AS 'cantidad_comentarios'";
                    $sql .= "FROM entradas a";
                    $sql .= "LEFT JOIN comentarios b ON a.id = b.entrada_id";
                    $sql .= "WHERE a.autor_id = :autor_id";
                    $sql .= "GROUP BY a.id";
                    $sql .= "ORDER by a.fecha DESC";
                    
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia = bindParam(":autor_id", $id_usuario, PDO::PARAM_STR);
                    $sentencia -> execute();
                    $resultado = $sentencia -> fetchAll();
                    
                    if(count($resultado)){
                        foreach ($resultado as $fila){
                            $entradas_obtenidas[] = array(
                                new Entrada($fila['id'], $fila['autor_id'], $fila['url'], $fila['titulo'], $fila['texto'], $fila['fecha'], $fila['activa']),
                                $fila['cantidad_comentarios']
                            );
                        }
                    }
                } catch (PDOException $ex) {
                    print "ERROR:" . $ex -> getMessage() . "<br>";
                }
            }
            return $entradas_obtenidas;
        }
                
    }
    