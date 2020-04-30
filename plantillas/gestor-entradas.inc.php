<div class="row parte-gestor-entradas">
    <div class="col-md-12">
        <h1>Gestión de entradas</h1>
        <br>
        <a href="#" class="btn btn-lg btn-primary" role="button" id="btn-nueva-entrada">Crear Entrada</a>
        <br><br>
    </div>
</div>
<div class="row parte-gestor-entradas">
    <div class="col-ms-12">
        <?php
        if (count($array_entradas) > 0) {
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Título</th>
                        <th>Estado</th>
                        <th>Comentarios</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for($i = 0; $i < count($array_entradas); $i++){
                            $entrada_actual = $array_entradas[$i][0];
                            $comentarios_entrada_actual = $array_entradas[$i][1];
                            ?>
                    <tr>
                        <td><?php echo $entrada_actual -> obtener_fecha(); ?></td>
                        <td><?php echo $entrada_actual -> obtener_titulo(); ?></td>
                        <td><?php echo $entrada_actual -> obtener_activa(); ?></td>
                        <td><?php echo $comentarios_entrada_actual; ?></td>
                        <td>
                            <button type="button" class="btn btn-default btn-xs">Editar</button>
                            <button type="button" class="btn btn-default btn-xs">Borrar</button>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            ?>
            <h3 class="text-center">Todavia no has escrito ninguna entrada</h3>
            <br><br>
            <?php
        }
        ?>
    </div>
</div>