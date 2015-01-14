<?php 
    $atributos = "class='form-horizontal bootstrap-validator-form'  novalidate='novalidate' id='defaultForm' ";
    $nombre = array('class'=>'form-control', 'type'=>'text', 'name'=>'nombre', 'data-original-title'=>'' ,'title'=>'');
    $descipcion = array('type'=>'text', 'class'=>'form-control', 'placeholder'=>'Ingrese Descripcion', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'name'=>'descripcion', 'title'=>'Ingresar Descripcion');
    $precio = array('type'=>'text', 'class'=>'form-control', 'placeholder'=>'Ingrese Precio en Bs.', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'name'=>'precio', 'title'=>'Ingresar Precio');
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
			<?=form_open(base_url().'index.php/c_componente/createcomponente',$atributos)?>
                        
                                
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Selecciones Tipoe</label>
                            <div class="col-sm-4">
                                
                                <select id="tipos" name="tipos">
                                    <?php foreach ($tipo as $item): ?>
                                    <option value="<?= $item['cod_tipo'] ?>"><?= $item['nombre_tipo'] ?></option>
                                <?php endforeach ?>
                                    
				</select>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre Componete</label>
                            <div class="col-sm-4">
                            
                            <?=  form_input($nombre)?> <?=form_error('nombre')?>
                            </div>
                        </div>                                    
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-4">
                                <?=  form_input($descipcion)?> <?=form_error('descripcion')?>
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
                            Guardar
                            </button>
                        </div>
                       
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary btn-label-left">
                            <span><i class="fa fa-clock-o"></i></span>
                            Buscar
                            </button>
			</div>
			</div>
                        <?=form_close()?>
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
	LoadSelect2Script(Select2Test);
        TinyMCEStart('#wysiwig_simple', null);
	TinyMCEStart('#wysiwig_full', 'extreme');
	// Add slider for change test input length
	FormLayoutExampleInputLength($( ".slider-style" ));
	// Initialize datepicker
	$('#input_date').datepicker({setDate: new Date()});
	// Load Timepicker plugin
	LoadTimePickerScript(DemoTimePicker);
	// Add tooltip to form-controls
	$('.form-control').tooltip();
	LoadSelect2Script(DemoSelect2);
	// Load example of form validation
	LoadBootstrapValidatorScript(DemoFormValidator);
	// Add drag-n-drop feature to boxes
	WinMove();
});
</script>



