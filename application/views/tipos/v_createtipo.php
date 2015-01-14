<script src="../validate/js/jquery.validate.min.js"></script>
<?php 
    $atributos = "class='form-horizontal' id='form-create-tipo'";
    
    $nombre = array('name' => 'nombre', 'id' => 'nombre', 'placeholder' => 'Ingrese Nombre' , 'class'=>'form-control');
?>
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">			
			<li><a href="#">Administrar Tipo</a></li>
			<li><a href="#">Crear Tipo</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Crear Tipo</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<h4 class="page-header">Formulario de Registro</h4>
                                <div id="mensaje">&nbsp;</div>
                    <form class='form-horizontal' id='form-create-tipo'>
                                
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-4">
                            <?=  form_input($nombre)?> <?=form_error('nombre')?>                                
                            </div>
                        </div>
                                                
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Ingrese Descripcion" data-toggle="tooltip" data-placement="bottom" name="descripcion" id="descripcion" title="Ingresar Descripcion">
                            </div>						                                                
                            <div class="clearfix"></div>
                        </div>
			<div class="form-group">			
                            <div class="col-sm-offset-2 col-sm-2">                         		                       
                                <button type="submit" class="btn btn-primary btn-large">Guargar</button>
                            </div>                                               
			</div>
                               
                      </form>
			</div>
		</div>
	</div>
</div>




<script type="text/javascript">
    $(document).ready(function (){
        $("#mensaje").hide();
        $('#form-create-tipo').validate({
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
                    url:"c_tipo/createtipo",
                    contentType: "application/x-www-form-urlencoded",
                    processData: true,
                    data: "nombre="+escape($('#nombre').val())+"&descripcion="+escape($('#descripcion').val()),
                    success: function(msg){
                        $("#mensaje").html("<p class='well'><strong>Guardato correctamente. Gracias!</strong></p>");
                        document.getElementById("nombre").value="";
			document.getElementById("descripcion").value="";                        
                        setTimeout(function() {$('#mensaje').fadeOut('fast');}, 3000);
                    }
                });
            }
                        
            
        });
    });
</script>

