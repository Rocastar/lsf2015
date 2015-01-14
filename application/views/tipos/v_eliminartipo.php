<?php 
    $atributos = "class='form-horizontal'";
?>

    <?=form_open(base_url().'index.php/c_tipo/deletetipo',$atributos)?>
    <input type="hidden" name="id_tipo" value="<?php echo $tipos->cod_tipo ?>">
    <fieldset>
        <legend>¿Desea eliminar este dato?</legend>
        <div class="form-group">
        <label class="col-sm-4 control-label">Nombre Tipo :</label>
            <div class="col-sm-4">
                <label  class="form-control"><?php echo $tipos->nombre_tipo?></label>
            </div>
        </div>
        
        <div class="form-group">
        <label class="col-sm-4 control-label">Descripción Tipo :</label>
            <div class="col-sm-4">
                <label  class="form-control"><?php echo $tipos->descripcion?></label>
            </div>
        </div>                
    </fieldset>														
		<div class="form-group">
			<div class="col-sm-9 col-sm-offset-3">
				<button type="submit" class="btn btn-primary">Eliminar</button>
			</div>
		</div>
<?=form_close()?>
			