<?php
include_once 'RepositorioEntrada.inc.php';

    class ValidadorEntrada {
        
        private $aviso_inicio;
        private $aviso_cierre;
        
        private $titulo;
        private $url;
        private $texto;
        
        private $error_titulo;
        private $error_url;
        private $error_texto;
        
        public function __construct($titulo,$url, $texto, $conexion){
            $this -> aviso_inicio = "<br><div role='alert' class='alert alert-danger'";
            $this -> aviso_cierre = "</div>";
            
            $this -> titulo = "";
            $this -> url = "";
            $this -> texto = "";
            
            $this -> error_titulo = $this -> validar_titulo($conexion, $titulo);
            $this -> error_url = $this -> validar_url($conexion, $url);
            $this -> error_texto = $this -> validar_texto($texto);
                    
        }
        
        private function variable_iniciada($variable){
            if(isset($variable) && !empty($variable)){
                return true;
            }else{
                return false;
            }
        }
        
        private function validar_titulo($conexion, $titulo){
            if(!$this -> variable_iniciada($titulo)){
                return "Debes escribir un titulo";
            }else{
                $this -> titulo = $titulo;
            }
            
            if(strlen($titulo) > 255 ){
                return "El titulo no puede ocupar mas de 255 caracteres";
            }
            
            if(RepositorioEntrada::titulo_existe($conexion, $titulo)){
                return "Ya existe un entrada con ese titulo, por favor escoge uno diferente.";
            }
        }
    }
