<?php
    class Comentario{
        
        private $id;
        private $autor_id;
        private $entrada_id;
        private $titulo;
        private $texto;
        private $fecha;
        
        public function __construct($id, $autor_id, $entrada_id, $titulo, $texto, $fecha) {
            $this -> id = $id;
            $this -> autor_id = $autor_id;
            $this -> entrada_id = $entrada_id;
            $this -> titulo = $titulo;
            $this -> texto = $texto;
            $this -> fecha = $fecha;
        }
        
        public function obtener_id() {
            return $this -> id;
        }

        public function obtener_autor_id() {
            return $this -> autor_id;
        }

        public function obtener_entrada_id() {
            return $this -> entrada_id;
        }

        public function obtener_titulo() {
            return $this -> titulo;
        }

        public function obtener_texto() {
            return $this -> texto;
        }

        public function obtener_techa() {
            return $this -> fecha;
        }

        public function cambiar_id($id) {
            $this -> id = $id;
        }

        public function cambiar_autor_id($autor_id) {
            $this -> autor_id = $autor_id;
        }

        public function cambiar_entrada_id($entrada_id) {
            $this -> entrada_id = $entrada_id;
        }

        public function cambiar_titulo($titulo) {
            $this -> titulo = $titulo;
        }

        public function cambiar_texto($texto) {
            $this -> texto = $texto;
        }

        public function cambiar_fecha($fecha) {
            $this -> fecha = $fecha;
        }

    }