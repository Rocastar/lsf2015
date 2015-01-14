<style>
            .loader{
                background-image: url(../img/ajax-loader.gif);
                background-repeat: no-repeat;
                background-position: center;
                height: 100px;                
            }
</style>

<?php $contador = 0; ?>

<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="#">Administrar Tipo</a></li>
			<li><a href="#">Lista Tipo</a></li>			
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					
					<span>Lista Tipo</span>
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
			<div class="box-content no-padding">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
					<thead>
						<tr>
							<th>Num</th>
							<th>Nombre Tipo</th>
							<th>Descripción</th>
                                                        <th>Editar</th>
                                                        <th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
					<!-- Start: list_row -->
                                        <?php foreach ($tipos as $item): ?>
                                            <tr>
                                                <td><?php 
                                                        $contador++;
                                                        echo($contador)?></td>
                                                <td><?php echo $item['nombre_tipo'] ?></td>
                                                <td><?php echo $item['descripcion'] ?></td>
                                                <td><a href="#" class="edit-record btn btn-primary" data-id="<?php echo $item['cod_tipo'] ?>">EDITAR</a></td></td>
                                                <td><a href="#" class="delet-record btn btn-primary" data-id="<?php echo $item['cod_tipo'] ?>">ELIMINAR</a></td>
                                            </tr>
                                        <?php endforeach ?>																		
					<!-- End: list_row -->
					</tbody>
					<tfoot>
						<tr>
							<th>Num</th>
							<th>Nombre Tipo</th>
							<th>Descripción Tipo</th>
                                                        <th>Editar</th>
                                                        <th>Eliminar</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- inicio Modal para mostar edicion--->
<div class="modal fade" id="editatipo" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Editar Tipo</h4>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerar</button>            
          </div>
        </div>
      </div>
</div>
<!-- fin Modal para mostar edicion--->

<!-- inicio Modal para mostar Eliminar--->
<div class="modal fade" id="eliminatipo" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Eliminar Tipo</h4>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerar</button>            
          </div>
        </div>
      </div>
</div>
<!-- fin Modal para mostar eliminar--->

<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
function AllTables(){
	TestTable1();
	TestTable2();
	TestTable3();
	LoadSelect2Script(MakeSelect2);
}
function MakeSelect2(){
	$('select').select2();
	$('.dataTables_filter').each(function(){
		$(this).find('label input[type=text]').attr('placeholder', 'Search');
	});
}
$(document).ready(function() {
	// Load Datatables and run plugin on tables 
	LoadDataTablesScripts(AllTables);
	// Add Drag-n-Drop feature
	WinMove();
});
</script>

<!-- Script para mostrar el modal de edicion--->
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click','.edit-record',function (e){
                    e.preventDefault();                    
                    
                    $('#editatipo').modal('show');            
                    $(".modal-body").html('');
                    $(".modal-body").addClass('loader');
                    
                    
                    $.post('c_tipo/edittipo/',
                            {id: $(this).attr('data-id')},
                            function(html){
                                $(".modal-body").removeClass('loader');
                                $(".modal-body").html(html);
                               
                            }
                    ); 
                                                           
                });
                
        $(document).on('click','.delet-record',function (e){
                    e.preventDefault();                    
                    
                    $('#eliminatipo').modal('show');            
                    $(".modal-body").html('');
                    $(".modal-body").addClass('loader');
                    
                    
                    $.post('c_tipo/eliminarTipo/',
                            {id: $(this).attr('data-id')},
                            function(html){
                                $(".modal-body").removeClass('loader');
                                $(".modal-body").html(html);
                               
                            }
                    ); 
                                                           
                });
    });
</script>