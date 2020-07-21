<?php
    header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found', true, 404);
    
    $titulo = "Not Found";
    
    include_once  'plantillas/documento-inicio.inc.php';
   ?>

<div class="erro404  container-fluid text-center">
    <div class="jumbotron">
        <h1 class="text-center">Error 404 Not Found</h1>
        <img src="https://firebasestorage.googleapis.com/v0/b/reactjs-1cb1d.appspot.com/o/imgReactJS%2F404.png?alt=media&token=80578f13-8875-4093-a515-aa102f657d1a"/>
    </div>
</div>

<?php
   include_once 'plantillas/documento-cierre.inc.php';
?>