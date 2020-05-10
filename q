warning: LF will be replaced by CRLF in app/Validador.inc.php.
The file will have its original line endings in your working directory
warning: LF will be replaced by CRLF in app/ValidadorEntrada.inc.php.
The file will have its original line endings in your working directory
warning: LF will be replaced by CRLF in app/ValidadorEntradaEditada.inc.php.
The file will have its original line endings in your working directory
[1mdiff --git a/app/Validador.inc.php b/app/Validador.inc.php[m
[1mindex 8b13789..f923470 100644[m
[1m--- a/app/Validador.inc.php[m
[1m+++ b/app/Validador.inc.php[m
[36m@@ -1 +1,129 @@[m
[31m-[m
[32m+[m[32m<?php[m[41m [m
[32m+[m[41m    [m
[32m+[m[32m    abstract class Validador{[m
[32m+[m[41m        [m
[32m+[m[32m        protected $aviso_inicio;[m
[32m+[m[32m        protected $aviso_cierre;[m
[32m+[m[41m        [m
[32m+[m[32m        protected $titulo;[m
[32m+[m[32m        protected $url;[m
[32m+[m[32m        protected $texto;[m
[32m+[m[41m        [m
[32m+[m[32m        protected $error_titulo;[m
[32m+[m[32m        protected $error_url;[m
[32m+[m[32m        protected $error_texto;[m
[32m+[m[41m        [m
[32m+[m[32m        public function __construct(){[m
[32m+[m[32m            // constructor basio[m
[32m+[m[32m        }[m
[32m+[m[41m        [m
[32m+[m[32m        public function variable_iniciada($variable){[m
[32m+[m[32m            if(isset($variable) && !empty($variable)){[m
[32m+[m[32m                return true;[m
[32m+[m[32m            }else{[m
[32m+[m[32m                return false;[m
[32m+[m[32m            }[m
[32m+[m[32m        }[m
[32m+[m[41m        [m
[32m+[m[32m        public function validar_titulo($conexion, $titulo){[m
[32m+[m[32m            if(!$this -> variable_iniciada($titulo)){[m
[32m+[m[32m                return "Debes escribir un titulo";[m
[32m+[m[32m            }else{[m
[32m+[m[32m                $this -> titulo = $titulo;[m
[32m+[m[32m            }[m
[32m+[m[41m            [m
[32m+[m[32m            if(strlen($titulo) > 255 ){[m
[32m+[m[32m                return "El titulo no puede ocupar mas de 255 caracteres";[m
[32m+[m[32m            }[m
[32m+[m[41m            [m
[32m+[m[32m            if(RepositorioEntrada::titulo_existe($conexion, $titulo)){[m
[32m+[m[32m                return "Ya existe un entrada con ese titulo, por favor escoge uno diferente.";[m
[32m+[m[32m            }[m
[32m+[m[32m        }[m
[32m+[m[41m        [m
[32m+[m[32m        public function validar_url($conexion, $url){[m
[32m+[m[32m            if(!$this -> variable_iniciada($url)){[m
[32m+[m[32m                return "Debes insertar una url";[m
[32m+[m[32m            }else{[m
[32m+[m[32m                $this -> url = $url;[m
[32m+[m[32m            }[m
[32m+[m[41m            [m
[32m+[m[32m            $url_tratada = str_replace(' ', '', $url);[m
[32m+[m[32m            $urñ_tratada = preg_replace('/\s+/', '', $url_tratada);[m
[32m+[m[41m            [m
[32m+[m[32m            if(strlen($url) != strlen($url_tratada)){[m
[32m+[m[32m                return "La URL no puede tener espacios";[m
[32m+[m[32m            }[m
[32m+[m[41m            [m
[32m+[m[32m            if(RepositorioEntrada::url_existe($conexion, $url)){[m
[32m+[m[32m                return "Ya existe otro articulo con la misma URL eligue otra diferente";[m
[32m+[m[32m            }[m
[32m+[m[32m        }[m
[32m+[m[41m        [m
[32m+[m[32m        public function validar_texto($conexion, $texto){[m
[32m+[m[32m            if(!$this -> variable_iniciada($texto)){[m
[32m+[m[32m                return "El contenido no puede estar vacio";[m
[32m+[m[32m            }else{[m
[32m+[m[32m                $this -> texto = $texto;[m
[32m+[m[32m            }[m
[32m+[m[32m        }[m
[32m+[m[41m        [m
[32m+[m[41m        [m
[32m+[m[32m        public function obtener_titulo(){[m
[32m+[m[32m            return $this -> titulo;[m
[32m+[m[32m        }[m
[32m+[m[41m        [m
[32m+[m[32m        public function obtener_url(){[m
[32m+[m[32m            return $this -> url;[m
[32m+[m[32m        }[m
[32m+[m[41m        [m
[32m+[m[32m        public function obtener_texto(){[m
[32m+[m[32m            return $this -> texto;[m
[32m+[m[32m        }[m
[32m+[m[41m        [m
[32m+[m[41m        [m
[32m+[m[32m        public function mostrar_titulo(){[m
[32m+[m[32m            if($this -> titulo != ""){[m
[32m+[m[32m                echo "value='" . $this -> titulo . "'";[m
[32m+[m[32m            }[m
[32m+[m[32m        }[m
[32m+[m[41m        [m
[32m+[m[32m        public function mostrar_url(){[m
[32m+[m[32m            if($this -> url != ""){[m
[32m+[m[32m                echo "value='" . $this -> url . "'";[m
[32m+[m[32m            }[m
[32m+[m[32m        }[m
[32m+[m[41m        [m
[32m+[m[32m        public function mostrar_texto(){[m
[32m+[m[32m            if($this -> texto != "" && strlen(trim($this -> texto)) > 0){[m
[32m+[m[32m                echo $this -> texto;[m
[32m+[m[32m            }[m
[32m+[m[32m        }[m
[32m+[m[41m        [m
[32m+[m[41m        [m
[32m+[m[32m        public function mostrar_error_titulo(){[m
[32m+[m[32m            if($this -> error_titulo != ""){[m
[32m+[m[32m                echo $this -> aviso_inicio . $this -> error_titulo . $this -> aviso_cierre;[m
[32m+[m[32m            }[m
[32m+[m[32m        }[m
[32m+[m[41m        [m
[32m+[m[32m        public function mostrar_error_url(){[m
[32m+[m[32m            if($this -> error_url != ""){[m
[32m+[m[32m                echo $this -> aviso_inicio . $this -> error_url . $this -> aviso_cierre;[m
[32m+[m[32m            }[m
[32m+[m[32m        }[m
[32m+[m[41m        [m
[32m+[m[32m        public function mostrar_error_texto(){[m
[32m+[m[32m            if($this -> error_texto != ""){[m
[32m+[m[32m                echo $this -> aviso_inicio . $this -> error_texto . $this -> aviso_cierre;[m
[32m+[m[32m            }[m
[32m+[m[32m        }[m
[32m+[m[41m        [m
[32m+[m[32m        public function entrada_valida(){[m
[32m+[m[32m            if( $this -> error_titulo == "" && $this -> error_url == "" && $this -> error_texto == ""){[m
[32m+[m[32m                return true;[m
[32m+[m[32m            }else{[m
[32m+[m[32m                return false;[m
[32m+[m[32m            }[m
[32m+[m[32m        }[m
[32m+[m[32m    }[m
[1mdiff --git a/app/ValidadorEntrada.inc.php b/app/ValidadorEntrada.inc.php[m
[1mindex 9e9bc0b..fe49d3a 100644[m
[1m--- a/app/ValidadorEntrada.inc.php[m
[1m+++ b/app/ValidadorEntrada.inc.php[m
[36m@@ -1,18 +1,8 @@[m
 <?php[m
 include_once 'RepositorioEntrada.inc.php';[m
[32m+[m[32minclude_once 'Validador.inc.php';[m
 [m
[31m-    class ValidadorEntrada {[m
[31m-        [m
[31m-        private $aviso_inicio;[m
[31m-        private $aviso_cierre;[m
[31m-        [m
[31m-        private $titulo;[m
[31m-        private $url;[m
[31m-        private $texto;[m
[31m-        [m
[31m-        private $error_titulo;[m
[31m-        private $error_url;[m
[31m-        private $error_texto;[m
[32m+[m[32m    class ValidadorEntrada extends Validador{[m
         [m
         public function __construct($titulo,$url, $texto, $conexion){[m
             $this -> aviso_inicio = "<br><div role='alert' class='alert alert-danger'>";[m
[36m@@ -28,115 +18,6 @@[m [minclude_once 'RepositorioEntrada.inc.php';[m
                     [m
         }[m
         [m
[31m-        private function variable_iniciada($variable){[m
[31m-            if(isset($variable) && !empty($variable)){[m
[31m-                return true;[m
[31m-            }else{[m
[31m-                return false;[m
[31m-            }[m
[31m-        }[m
[31m-        [m
[31m-        private function validar_titulo($conexion, $titulo){[m
[31m-            if(!$this -> variable_iniciada($titulo)){[m
[31m-                return "Debes escribir un titulo";[m
[31m-            }else{[m
[31m-                $this -> titulo = $titulo;[m
[31m-            }[m
[31m-            [m
[31m-            if(strlen($titulo) > 255 ){[m
[31m-                return "El titulo no puede ocupar mas de 255 caracteres";[m
[31m-            }[m
[31m-            [m
[31m-            if(RepositorioEntrada::titulo_existe($conexion, $titulo)){[m
[31m-                return "Ya existe un entrada con ese titulo, por favor escoge uno diferente.";[m
[31m-            }[m
[31m-        }[m
[31m-        [m
[31m-        private function validar_url($conexion, $url){[m
[31m-            if(!$this -> variable_iniciada($url)){[m
[31m-                return "Debes insertar una url";[m
[31m-            }else{[m
[31m-                $this -> url = $url;[m
[31m-            }[m
[31m-            [m
[31m-            $url_tratada = str_replace(' ', '', $url);[m
[31m-            $urñ_tratada = preg_replace('/\s+/', '', $url_tratada);[m
[31m-            [m
[31m-            if(strlen($url) != strlen($url_tratada)){[m
[31m-                return "La URL no puede tener espacios";[m
[31m-            }[m
[31m-            [m
[31m-            if(RepositorioEntrada::url_existe($conexion, $url)){[m
[31m-                return "Ya existe otro articulo con la misma URL eligue otra diferente";[m
[31m-            }[m
[31m-        }[m
[31m-        [m
[31m-        private function validar_texto($conexion, $texto){[m
[31m-            if(!$this -> variable_iniciada($texto)){[m
[31m-                return "El contenido no puede estar vacio";[m
[31m-            }else{[m
[31m-                $this -> texto = $texto;[m
[31m-            }[m
[31m-        }[m
[31m-        [m
[31m-        [m
[31m-        public function obtener_titulo(){[m
[31m-            return $this -> titulo;[m
[31m-        }[m
[31m-        [m
[31m-        public function obtener_url(){[m
[31m-            return $this -> url;[m
[31m-        }[m
[31m-        [m
[31m-        public function obtener_texto(){[m
[31m-            return $this -> texto;[m
[31m-        }[m
[31m-        [m
[31m-        [m
[31m-        public function mostrar_titulo(){[m
[31m-            if($this -> titulo != ""){[m
[31m-                echo "value='" . $this -> titulo . "'";[m
[31m-            }[m
[31m-        }[m
[31m-        [m
[31m-        public function mostrar_url(){[m
[31m-            if($this -> url != ""){[m
[31m-                echo "value='" . $this -> url . "'";[m
[31m-            }[m
[31m-        }[m
[31m-        [m
[31m-        public function mostrar_texto(){[m
[31m-            if($this -> texto != "" && strlen(trim($this -> texto)) > 0){[m
[31m-                echo $this -> texto;[m
[31m-            }[m
[31m-        }[m
[31m-        [m
[31m-        [m
[31m-        public function mostrar_error_titulo(){[m
[31m-            if($this -> error_titulo != ""){[m
[31m-                echo $this -> aviso_inicio . $this -> error_titulo . $this -> aviso_cierre;[m
[31m-            }[m
[31m-        }[m
[31m-        [m
[31m-        public function mostrar_error_url(){[m
[31m-            if($this -> error_url != ""){[m
[31m-                echo $this -> aviso_inicio . $this -> error_url . $this -> aviso_cierre;[m
[31m-            }[m
[31m-        }[m
[31m-        [m
[31m-        public function mostrar_error_texto(){[m
[31m-            if($this -> error_texto != ""){[m
[31m-                echo $this -> aviso_inicio . $this -> error_texto . $this -> aviso_cierre;[m
[31m-            }[m
[31m-        }[m
[31m-        [m
[31m-        public function entrada_valida(){[m
[31m-            if( $this -> error_titulo == "" && $this -> error_url == "" && $this -> error_texto == ""){[m
[31m-                return true;[m
[31m-            }else{[m
[31m-                return false;[m
[31m-            }[m
[31m-        }[m
     }[m
 [m
     [m
[1mdiff --git a/app/ValidadorEntradaEditada.inc.php b/app/ValidadorEntradaEditada.inc.php[m
[1mindex 8b13789..8877eb7 100644[m
[1m--- a/app/ValidadorEntradaEditada.inc.php[m
[1m+++ b/app/ValidadorEntradaEditada.inc.php[m
[36m@@ -1 +1,7 @@[m
[32m+[m[32m<?php[m
[32m+[m[32minclude_once 'RepositorioEntrada.inc.php';[m
[32m+[m[32minclude_once 'Validador.inc.php';[m
 [m
[32m+[m[32m    class ValidadorEntradaEditada extends Validador {[m
[32m+[m[41m        [m
[32m+[m[32m    }[m
