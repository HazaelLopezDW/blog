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
        $titulo = sa(10);
        $texto = lorem();
        $autor = rand(1, 100);
        $entrada = rand(1, 100);
        
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
        $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam arcu tellus, 
                  facilisis a sem non, elementum commodo orci. Proin rutrum mollis egestas. Suspendisse porttitor ut nisl eu sollicitudin. 
                  Phasellus non feugiat dui. Praesent sed ultrices purus. Pellentesque quis justo id urna posuere ullamcorper. Nam urna justo, 
                  elementum ut turpis vitae, interdum ultrices diam. Phasellus eget volutpat erat. In blandit imperdiet ante non consectetur. 
                  Vestibulum mollis gravida scelerisque. Duis posuere augue maximus est porta, suscipit scelerisque ante condimentum.

                  Vestibulum in interdum quam. Praesent quis ex dictum, suscipit nulla sed, accumsan tortor. Sed maximus augue ac erat dictum, 
                  ornare bibendum dui cursus. Donec egestas accumsan eros vitae iaculis. Aliquam vestibulum nec lorem a consectetur. In vitae mauris 
                  quis augue auctor venenatis. Ut in cursus metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                  himenaeos. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer semper neque sit amet 
                  tempor elementum. Vestibulum et fermentum eros, a tincidunt risus. Nulla porttitor et lorem eget malesuada. Vestibulum ante ipsum
                  primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis eget ex mollis, vehicula risus at, placerat neque.

                  Aliquam enim tortor, aliquam lacinia viverra et, pharetra a nulla. Phasellus mattis tortor et urna tempus iaculis in non mauris.
                  Ut congue ipsum varius felis rutrum, et consequat lectus placerat. Sed vel interdum tortor. Nulla lectus lorem, consectetur nec 
                  porta ut, vehicula sed neque. Proin eu pellentesque mi. Donec tincidunt tortor dolor, ac sagittis lacus elementum vel. 
                  Sed et sapien tincidunt, tempus nibh vel, sollicitudin libero. Morbi porttitor est erat, sed porttitor velit 
                  hendrerit non. In congue laoreet malesuada. Donec enim mi, pellentesque ut metus nec, interdum suscipit purus.

                  Ut aliquam tellus a aliquam posuere. 
                  In condimentum rutrum lorem id vestibulum. 
                  Phasellus ligula mi, condimentum vitae tincidunt non, 
                  tincidunt eget purus. Proin odio metus, laoreet sed libero a,
                  dictum tempus enim. Donec consectetur, arcu eu rhoncus venenatis, nulla urna cursus quam, in ultricies ligula arcu nec lacus. Nunc 
                  lobortis mattis rutrum. Nunc at ipsum et ipsum auctor rutrum. Curabitur sollicitudin at diam nec egestas. Nullam bibendum sagittis 
                  turpis, in blandit tellus ullamcorper non. Sed vitae ipsum at dui rhoncus accumsan eu eget mauris. In pretium placerat justo vel 
                  sollicitudin. Curabitur fermentum consequat placerat. Vivamus tempus ex velit, id feugiat turpis egestas nec. Quisque ipsum leo, 
                  sodales eu fringilla non, posuere vitae orci. Nullam auctor tortor nibh. Donec sagittis massa velit, ut mollis ligula scelerisque quis.

                Donec iaculis diam a justo ultrices tempus. Orci varius natoque penatibus et magnis dis parturient 
                montes, nascetur ridiculus mus. Ut ornare, tellus sed faucibus fermentum, odio ligula ullamcorper metus, quis venenatis dui neque eu nunc.
                Fusce ornare ultricies felis id aliquam. Proin eu ipsum metus. Donec interdum varius turpis, a placerat orci. Pellentesque lacinia 
                fringilla magna, a lacinia nulla efficitur at. Vestibulum ac metus convallis, tincidunt dui consectetur, malesuada felis. Quisque 
                consectetur odio lacus, ut mattis purus molestie eget. Phasellus a ante erat. Nam lacinia, dui quis hendrerit malesuada, arcu ligula 
                bibendum diam, vitae porta massa lacus at tellus. Duis sed placerat eros';
        
        return $lorem;
    }