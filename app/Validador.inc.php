<?php 
    
    abstract class Validador{
        
        protected $aviso_inicio;
        protected $aviso_cierre;
        
        protected $titulo;
        protected $url;
        protected $texto;
        
        protected $error_titulo;
        protected $error_url;
        protected $error_texto;
        
        public function __construct(){
            // constructor basio
        }
        
        public function variable_iniciada($variable){
            if(isset($variable) && !empty($variable)){
                return true;
            }else{
                return false;
            }
        }
        
        public function validar_titulo($conexion, $titulo){
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
        
        public function validar_url($conexion, $url){
            if(!$this -> variable_iniciada($url)){
                return "Debes insertar una url";
            }else{
                $this -> url = $url;
            }
            
            $url_tratada = str_replace(' ', '', $url);
            $urñ_tratada = preg_replace('/\s+/', '', $url_tratada);
            
            if(strlen($url) != strlen($url_tratada)){
                return "La URL no puede tener espacios";
            }
            
            if(RepositorioEntrada::url_existe($conexion, $url)){
                return "Ya existe otro articulo con la misma URL eligue otra diferente";
            }
        }
        
        public function validar_texto($conexion, $texto){
            if(!$this -> variable_iniciada($texto)){
                return "El contenido no puede estar vacio";
            }else{
                $this -> texto = $texto;
            }
        }
        
        
        public function obtener_titulo(){
            return $this -> titulo;
        }
        
        public function obtener_url(){
            return $this -> url;
        }
        
        public function obtener_texto(){
            return $this -> texto;
        }
        
        
        public function mostrar_titulo(){
            if($this -> titulo != ""){
                echo "value='" . $this -> titulo . "'";
            }
        }
        
        public function mostrar_url(){
            if($this -> url != ""){
                echo "value='" . $this -> url . "'";
            }
        }
        
        public function mostrar_texto(){
            if($this -> texto != "" && strlen(trim($this -> texto)) > 0){
                echo $this -> texto;
            }
        }
        
        
        public function mostrar_error_titulo(){
            if($this -> error_titulo != ""){
                echo $this -> aviso_inicio . $this -> error_titulo . $this -> aviso_cierre;
            }
        }
        
        public function mostrar_error_url(){
            if($this -> error_url != ""){
                echo $this -> aviso_inicio . $this -> error_url . $this -> aviso_cierre;
            }
        }
        
        public function mostrar_error_texto(){
            if($this -> error_texto != ""){
                echo $this -> aviso_inicio . $this -> error_texto . $this -> aviso_cierre;
            }
        }
        
        public function entrada_valida(){
            if( $this -> error_titulo == "" && $this -> error_url == "" && $this -> error_texto == ""){
                return true;
            }else{
                return false;
            }
        }
    }
