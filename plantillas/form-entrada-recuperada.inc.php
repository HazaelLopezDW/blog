<div class="form-group">
    <label for="titulo">Titulo</label>
    <input id="titulo" type="text" class="form-control" name="titulo" placeholder="Ponle un titulo a esta entrada" value="<?php echo $entrada_recuperada ->
            obtener_titulo(); ?>">
</div>
<div class="form-group">
    <label for="url">URL</label>
    <input id="url" type="text" class="form-control" name="url" placeholder="Dereccion unica sin espacios para la entrada" value="<?php echo $entrada_recuperada ->
            obtener_url(); ?>">
</div>
<div class="form-group">
    <label for="contenido">Contenido</label>
    <textarea id="contenido" class="form-control" rows="5" name="texto" placeholder="Escribe aquí tu articulo"><?php echo $entrada_recuperada ->
            obtener_titulo(); ?>"</textarea>
</div>
<div class="checkbox">
    <label>
        <input type="checkbox" name="publicar" value="si" <?php if($entrada_recuperada -> obtener_activa()) echo "checked"; ?>>Marca este recuadro si quieres que la entrada se publique de inmediato
    </label>
</div>
<br>
<button type="submit" class="btn btn-default btn-primary" name="guardar">Guaradar Entrada</button>

