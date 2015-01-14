<script src="../validate/js/jquery.validate.min.js"></script>
<?php 
    $atributos = "class='form-horizontal' index.php/c_tipo/updatetipo'";
?>

   
<form class='form-horizontal' id='form-editar-tipo'>
    <input type="hidden" name="id_tipo" id="id_tipo" value="<?php echo $tipos->cod_tipo ?>">
    <fieldset>
        <legend>Actualice cada uno de los campos</legend>
        <div id="mensaje">&nbsp;</div>
        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre_Tipo</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Ingrese Tipo" data-toggle="tooltip" data-placement="bottom" name="nombre" id="nombre" title="Ingresar Tipo" value="<?php echo $tipos->nombre_tipo?>">
                            </div>
                        </div>                                    
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Ingrese Descripcion" data-toggle="tooltip" data-placement="bottom" name="descripcion" id="descripcion" title="Ingresar Descripcion" value="<?php echo $tipos->descripcion ?>">
                            </div>						                                                
                            <div class="clearfix"></div>
                        </div>
    </fieldset>														
		<div class="form-group">
			<div class="col-sm-9 col-sm-offset-3">
				<button type="submit" class="btn btn-primary btn-large">Guargar</button>
			</div>
		</div>
</form>


<script type="text/javascript">
    $(document).ready(function (){
        $("#mensaje").hide();
        $('#form-editar-tipo').validate({
            event:"blur",
            rules:{                
                'nombre': "required",
                'descripcion': "required"
            },
            messages: {'nombre': "Por favor ingrese nombre TIPO"},
                    debug: true,errorElement: "label",
            submitHandler: function(form){
		$("#mensaje").show();
		$("#mensaje").html("<p class='well'><strong>Guardando TIPO.......</strong></p>");
                
                $.ajax({
                    type: "POST",
                    url:"c_tipo/updatetipo",
                    contentType: "application/x-www-form-urlencoded",
                    processData: true,
                    data: "id_tipo="+escape($('#id_tipo').val())+"&nombre="+escape($('#nombre').val())+"&descripcion="+escape($('#descripcion').val()),
                    success: function(msg){
                        $("#mensaje").html("<p class='well'><strong>Guardato correctamente. Gracias!</strong></p>");
                        document.getElementById("nombre").value="";
			document.getElementById("descripcion").value="";                        
                        setTimeout(function() {$('#mensaje').fadeOut('fast');}, 3000);
                        $('#editatipo').modal('hide');
                        location.reload(); 
                    }
                });
            }
                        
            
        });
    });
</script>

