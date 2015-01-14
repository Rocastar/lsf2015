
<?php $contador = 0; ?>

<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="#">Administrar Componente</a></li>
			<li><a href="#">Lista Componete</a></li>			
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					
					<span>Lista Componente</span>
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
							<th>Nombre Componente</th>
                                                        
                                                        <th>Precio</th>
                                                        <th>Descripcion</th>
						</tr>
					</thead>
					<tbody>
					<!-- Start: list_row -->
                                        <?php foreach ($componente as $item): ?>
                                            <tr>
                                                <td><?php 
                                                        $contador++;
                                                        echo($contador)?></td>
                                                <td><?php echo $item->nombre_tipo ?></td>
                                                
                                                <td><?php echo $item->nombre_componente ?></td>
                                                
                                                <td><?php echo $item->precio ?></td>
                                                <td><?php echo $item->descripcion ?></td>
                                            </tr>
                                        <?php endforeach ?>														
					<!-- End: list_row -->
					</tbody>
					<tfoot>
						<tr>
							<th>Num</th>
							<th>Nombre Tipo</th>
							<th>Nombre Componente</th>
                                                        <th>Precio</th>							
                                                        <th>Descipcion</th>	
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>


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

