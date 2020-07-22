<!DOCTYPE html>
<html> 
    <head>
        <?php 
            if(!isset($titulo) && empty($titulo)){
                $titulo = "blog de JavaDevOne";
            }
            echo "<title>$titulo</title>";
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="MetaData para los motores de busqueda">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>estilos.css">
    </head>
    <body>
