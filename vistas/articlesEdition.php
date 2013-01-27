<?php
$vista = new panelView;
$vista->plantillaPanel();
    if($valores=="crear"){
?>
<div class="container">
<form class="form-horizontal" action="panel.php?accion=registrar" method="post">
    <fieldset>
        <legend>Articulo nuevo</legend>
        <div class="control-group">
            <label class="control-label" for="input01">Titulo</label>
            <div class="controls">
                <input type="text" name="titulo" class="input-xlarge" id="input01" placeholder="Introduzca el titulo del articulo">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="textarea">Área de texto</label>
            <div class="controls">
                <textarea class="input-xlarge span8" name="resumen" id="textarea" rows="8" placeholder="Introduzca un resumen"></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="textarea">Área de texto</label>
            <div class="controls">
                <textarea class="input-xlarge span8" name="contenido" id="textarea" rows="20" placeholder="Introduzca contenido"></textarea>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" class="btn btn-primary" name="peticion" value="Enviar" />
            <input type="submit" class="btn" name="peticion" value="Cancelar"/>
            <input type="reset" class="btn" value="Reset" />
        </div>
    </fieldset>
</form>
</div>
<?
    }
    else{
        $titulo = $valores['titulo'];
        $contenido = $valores['contenido'];
        $resumen = $valores['resumen'];
        $id =$valores['id'];
?>
<div class="container">
        <form class="form-horizontal" action="panel.php?accion=actualizar&id=<?=$id?>" method="post">
            <fieldset>
                <legend>Actualizar articulo</legend>
                <div class="control-group">
                    <label class="control-label" for="input01">Titulo</label>
                    <div class="controls">
                        <input type="text" name="titulo" class="input-xlarge" id="input01" value="<?=$titulo?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textarea">Área de resumen</label>
                    <div class="controls">
                        <textarea class="input-xlarge span8" name="resumen" id="textarea" rows="8" ><?=$resumen?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textarea">Área de contenido</label>
                    <div class="controls">
                        <textarea class="input-xlarge span8" name="contenido" id="textarea" rows="20" ><?=$contenido?></textarea>
                    </div>
                </div>
                <div class="form-actions">
                    <input type="submit" class="btn btn-primary" name="peticion" value="Actualizar" />
                    <input type="submit" class="btn" name="peticion" value="Cancelar"/>
                    <input type="reset" class="btn" value="Reset" />

                </div>
            </fieldset>
      </form>

</div>
<?
    }
?>

