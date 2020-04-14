<?php
    include_once 'Config.inc.php';
    include_once 'Conexion.inc.php';
    include_once 'RepositorioEntrada.inc.php';
    include_once 'Entrada.inc.php';
    
    class EscritorEntradas{
        
        public static function escribir_entradas(){
          
            $entradas = RepositorioEntrada::obtener_todas_por_fecha_descendiente(Conexion::obtener_conexion());

            if(count($entradas)){
                foreach ($entradas as $entrada) {
                    self::escribir_entrada($entrada);
                }
            }
        }
        
        public static function escribir_entrada($entrada){
            if(!isset($entrada)){
                return;
            }
?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php
                        echo $entrada -> obtener_titulo();
                    ?>
                </div>
                <div class="panel-body">
                    <p>
                        <strong>
                            <?php
                                echo $entrada -> obtener_fecha();
                            ?>
                        </strong>
                    </p>
                    <?php
                        echo nl2br($entrada -> obtener_texto());
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
        }
    }
