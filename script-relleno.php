<?php
    include_once 'app/Config.inc.php';
    include_once 'app/Conexion.inc.php';
    
    
    include_once 'app/Usuario.inc.php';
    include_once 'app/Entrada.inc.php';
    include_once 'app/Comentario.inc.php';
    
    include_once 'app/RepositorioUsuario.inc.php';
    include_once 'app/RepositorioEntrada.inc.php';
    include_once 'app/RepositorioComentario.inc.php';
    
    Conexion::abrir_conexion();
    
    for($usuarios = 0; $usuarios < 100; $usuarios++){
        $nombre = sa(10);
        $email = sa(5)."@".sa(3);
        $password = password_hash("123456", PASSWORD_DEFAULT);
        
        $usuario = new Usuario("", $nombre, $email, $password, "", "");
        RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario);
    }
    
    for($entradas = 0; $entradas < 100; $entradas++){
        $titulo = sa(10);
        $texto = lorem();
        $autor = rand(1, 100);
        
        $entrada = new Entrada("", $autor, $titulo, $texto, "", "");
        RepositorioEntrada::insertar_entrada(Conexion::obtener_conexion(), $entrada);
    }
    
    for($comentarios = 0; $comentarios < 100; $comentarios++){
        $autor = rand(1, 100);
        $entrada = rand(1, 100);
        $titulo = sa(10);
        $texto = lorem();
        
        $comentario = new Comentario("", $autor, $entrada, $titulo, $texto, "");
        RepositorioComentario::insertar_comentario(Conexion::obtener_conexion(), $comentario);
    }
    
    function sa($longitud){
        $caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCEDFGHIJKLMNOPQRSTUVWXYZ";
        $numero_caracteres = strlen($caracteres);
        $string_aleatorio = "";
        
        for($i=0; $i < $longitud; $i++){
            $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
        }
        
        return $string_aleatorio;
    }
    
    function lorem(){
        $lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et tellus aliquam, vehicula massa ut, posuere orci. Vivamus faucibus bibendum lacus, auctor lobortis est consequat et. Nulla facilisi. In vitae imperdiet orci, vel ultricies ipsum. Integer convallis, tortor at sollicitudin facilisis, eros nisi suscipit dolor, quis rhoncus dui massa a augue. Fusce convallis arcu in sapien condimentum pharetra. Mauris facilisis, orci a rhoncus finibus, massa ipsum maximus augue, eget sagittis ipsum nibh nec eros. Quisque velit leo, blandit nec facilisis cursus, sollicitudin non lorem.

Ut eu fermentum ex, non commodo nisl. Vivamus vestibulum arcu eu neque dictum blandit. Suspendisse tempus egestas nunc vitae commodo. Praesent mauris dui, tristique et consequat bibendum, semper lobortis tortor. Donec eu libero at turpis mollis pharetra et sit amet ipsum. Aenean placerat, lorem vel maximus viverra, ex justo rutrum metus, non condimentum elit eros vitae diam. Ut tincidunt sollicitudin sem id scelerisque. Sed vitae diam aliquet, condimentum felis ut, molestie elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pellentesque sit amet augue ut dignissim. Morbi cursus euismod placerat. In at ex ac justo suscipit efficitur quis vel est. Maecenas eget suscipit risus, sed fringilla dolor. Duis at mi id arcu sollicitudin sagittis. Integer libero elit, euismod quis quam nec, tincidunt eleifend urna.

Sed a sem nec purus ornare gravida. Fusce vel ligula lacus. Nullam in dignissim elit. Nunc quis ipsum elementum, facilisis leo ullamcorper, placerat mauris. Proin condimentum cursus urna, quis interdum enim vehicula vel. Integer ullamcorper lacus eu libero volutpat pretium. Donec ex mi, pharetra sed tempus id, fermentum vitae orci. Suspendisse euismod sapien a dolor placerat tincidunt. Nam pulvinar ornare lectus non pharetra. Nulla pretium ut neque sit amet interdum. Sed facilisis et nisi quis lobortis.

Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras quis hendrerit justo, nec vehicula dui. Donec efficitur sapien consectetur purus bibendum congue. Donec porta vulputate egestas. Cras eget arcu a est maximus consectetur. Proin ornare pellentesque dui, quis vestibulum augue tristique nec. Pellentesque eu consectetur nisi, tristique ullamcorper orci.

Mauris ac mattis purus. Phasellus pretium, leo id scelerisque blandit, massa nisi semper tortor, vel volutpat ligula odio vitae magna. Donec id dui nec nisi feugiat eleifend et eu erat. Integer finibus velit nec purus gravida, eu euismod diam ultrices. Fusce et sapien ac risus commodo consequat eget ullamcorper libero. Cras mattis, eros sed venenatis hendrerit, metus ipsum facilisis sapien, sed venenatis arcu nulla posuere erat. Aliquam vehicula tempus tellus. Aliquam purus ex, commodo ut tincidunt et, euismod vel dolor. Aenean gravida, lectus tempor egestas tincidunt, nisl ex fermentum augue, suscipit sagittis eros erat molestie odio. Donec dictum tempus lacus, vel faucibus lectus aliquet et. Nunc aliquet posuere mi, vel efficitur tortor lobortis sed. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum a cursus nisl, non malesuada libero. Suspendisse ligula magna, condimentum id mauris et, auctor varius diam. Aliquam tristique elementum lorem quis consectetur.";
        
        return $lorem;
    }