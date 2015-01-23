<script src="../validate/js/jquery.validate.min.js"></script>
<?php 
    $atributos = "class='form-horizontal bootstrap-validator-form'  novalidate='novalidate' id='defaultForm' ";
    $nombre = array('class'=>'form-control', 'placeholder'=>'Ingrese Nombre de Componente', 'type'=>'text', 'name'=>'nombre','id'=>'nombre', 'data-original-title'=>'' ,'title'=>'');
    $descripcion = array('type'=>'text', 'class'=>'form-control', 'placeholder'=>'Ingrese Descripción', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'name'=>'descripcion','id'=>'descripcion', 'title'=>'Ingresar Descripcion');
    $precio = array('type'=>'text', 'class'=>'form-control', 'placeholder'=>'Ingrese Precio en Bs.', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'name'=>'precio','id'=>'precio', 'title'=>'Ingresar Precio');
?>
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">			
			<li><a href="#">Administrar Componente</a></li>
			<li><a href="#">Crear Componente</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Crear Componente</span>
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
        
        <div id="mensaje">&nbsp;jkjkjjkjkj</div>
        <form class='form-horizontal' id='form-create-componente'>
        <div class="form-group">
          <label class="col-sm-2 control-label">Seleccionar Tipo</label>
          <div class="col-sm-4">                
            <select id="tipos" name="tipos">
              <?php foreach ($tipo as $item): ?>
              <option value="<?= $item['cod_tipo'] ?>"><?= $item['nombre_tipo'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>  
        <div class="form-group">
          <label class="col-sm-2 control-label">Nombre Componente</label>
          <div class="col-sm-4">
            <?=  form_input($nombre)?> <?=form_error('nombre')?>
          </div>
        </div>                                    
        <div class="form-group">
          <label class="col-sm-2 control-label">Descripción</label>
          <div class="col-sm-4">
            <?=  form_input($descripcion)?> <?=form_error('descripcion')?>
          </div>						                                                
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Precio</label>
          <div class="col-sm-4">
            <?=  form_input($precio)?> <?=form_error('precio')?>                               
          </div>						                                                
          <div class="clearfix"></div>
        </div>
  			<div class="form-group">
  			  <div class="col-sm-offset-2 col-sm-2">
            <button type="cancel" class="btn btn-default btn-label-left">
              <span><i class="fa fa-clock-o txt-danger"></i></span>
              Buscar
            </button>
          </div>
                         
          <div class="col-sm-2">  
            <!-- <button type="submit" class="btn btn-primary btn-label-left">
              <span><i class="fa fa-clock-o"></i></span>
              Guardar
            </button> -->
          <button type="submit" class="btn btn-primary btn-large">Guardar</button>

  			  </div>
  			</div>
        </form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
// Run Select2 on element
function Select2Test(){
	$("#tipos").select2();
}
$(document).ready(function() {
	// Load script of Select2 and run this
	// LoadSelect2Script(Select2Test);
 //        TinyMCEStart('#wysiwig_simple', null);
	// TinyMCEStart('#wysiwig_full', 'extreme');
	// // Add slider for change test input length
	// FormLayoutExampleInputLength($( ".slider-style" ));
	// // Initialize datepicker
	// $('#input_date').datepicker({setDate: new Date()});
	// // Load Timepicker plugin
	// LoadTimePickerScript(DemoTimePicker);
	// // Add tooltip to form-controls
	// $('.form-control').tooltip();
	// LoadSelect2Script(DemoSelect2);
	// // Load example of form validation
	// LoadBootstrapValidatorScript(DemoFormValidator);
	// // Add drag-n-drop feature to boxes
	// WinMove();

  $("#mensaje").hide();
  $('#form-create-componente').validate({
    event:"blur",
    rules: {                
      'nombre': "required",
      'descripcion': "required",
      'precio' : "required"
    },
    messages: {
      'nombre': "Por favor ingrese nombre del componente",
      'descripcion': "Por favor ingrese la descripcion",
      'precio': "Por favor ingrese precio del componente"
    },
    debug: true,errorElement: "label",
    submitHandler: function(form){
      $("#mensaje").show();
      $("#mensaje").html("<p class='well'><strong>Guardando Componente.......</strong></p>");
              
      $.ajax({
        type: "POST",
        url:"c_componente/createcomponente",
        contentType: "application/x-www-form-urlencoded",
        processData: true,
        data: "nombre="+escape($('#nombre').val())+
              "&tipos="+escape($('#tipos').val())+
              "&descripcion="+escape($('#descripcion').val())+
              "&precio="+escape($('#precio').val()),
              success: function(msg){
                $("#mensaje").html("<p class='well'><strong>Componente guardado correctamente. Gracias !</strong></p>");
                document.getElementById("nombre").value="";
                document.getElementById("descripcion").value="";                        
                document.getElementById("precio").value="";
                setTimeout(function() {$('#mensaje').fadeOut('fast');}, 3000);
              }
      });
    }                                    
  
  });
});
</script>



