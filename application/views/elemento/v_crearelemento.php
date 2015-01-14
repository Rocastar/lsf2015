<?php 

    $atributos = "class='form-horizontal'";
    $nombreelemento= array('class'=>'form-control', 'type'=>'text', 'placeholder'=>'Ingrese el Elemento' ,'name'=>'nombreelemento', 'data-original-title'=>'', 'title'=>'Ingrese nombre del Elemento');
    $tipovalor= array('class'=>'form-control', 'type'=>'text', 'placeholder'=>'Ingrese Solo un valor numerico' ,'name'=>'tipovalor', 'data-original-title'=>'', 'title'=>'Ingrese Solo un valor numerico');
    $rango= array('class'=>'form-control', 'type'=>'text', 'placeholder'=>'Ingrese Rango' ,'name'=>'rango', 'data-original-title'=>'', 'title'=>'Ingrese Rango');
?>
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">			
			<li><a href="#">Administrar Elemento</a></li>
			<li><a href="#">Crear Elemento</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Crear Elemento</span>
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
				<?=form_open(base_url().'index.php/c_elemento/creatElemento',$atributos)?>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nombre del Componente</label>
                                    <div class="col-sm-5">
					<select id="componente" name="componente">
                                            <?php foreach ($componente as $item): ?>
                                                <option value="<?= $item->cod_componente ?>"><?= $item->nombre_componente ?></option>
                                            <?php endforeach ?>                                    
                                        </select>
                                    </div>
				</div>                                                        
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre Elemento</label>
                            <div class="col-sm-5">
				<?=  form_input($nombreelemento)?> <?=form_error('nombreelemento')?>
                            </div>
			</div>                                   
                                                                       
                         <h4 class="page-header">Valor de Referencia</h4>                         
				<div class="form-group">
					<label class="col-sm-3 control-label">Tipo Valor</label>
					<div class="col-sm-5">
						<?=  form_input($tipovalor)?> <?=form_error('tipovalor')?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Rango</label>
					<div class="col-sm-5">
						<?=  form_input($rango)?> <?=form_error('rango')?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Unidad de Rango</label>
					<div class="col-sm-5">
						<select class="populate placeholder" name="unidadrango" id="unidadrango">
                                        		<option value="mm 3">mm 3</option>
							<option value="cc 3">cc 3</option>
							<option value="gr">gr</option>
							<option value="lt">lt</option>									
						</select>
					</div>
				</div>
                        
                        <div class="form-group">
				<label class="col-sm-3 control-label">Muestra Análisis</label>
				<div class="col-sm-5">
				<select class="populate placeholder" name="muestra" id="muestra">									
					<option value="Sangre">Sangre</option>
					<option value="Orina">Orina</option>
					<option value="Suero">Suero</option>
					<option value="Eses">Eses</option>
					<option value="Otros">Otros</option>
				</select>
				</div>
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
// Run Select2 plugin on elements
function DemoSelect2(){
	$("#componente").select2();
        $("#unidadrango").select2();
        $("#muestra").select2();
}
// Run timepicker
function DemoTimePicker(){
	$('#input_time').timepicker({setDate: new Date()});
}
$(document).ready(function() {
	// Create Wysiwig editor for textare
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
