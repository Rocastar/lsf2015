
<?php $contador = 0; ?>

<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="#">Administrar Elemento</a></li>
			<li><a href="#">Lista Elemento</a></li>			
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					
					<span>Lista Elemento</span>
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
                                                        <th>Componente</th>
							<th>Nombre Elemento</th>                                                        
                                                        <th>Tipo Valor</th>
                                                        <th>Rango</th>
                                                        <th>Unidad Rango</th>
                                                        <th>Tipo Muestra</th>
						</tr>
					</thead>
					<tbody>
					<!-- Start: list_row -->
                                        <?php foreach ($componente as $item): ?>
                                            <tr>
                                                <td><?php 
                                                        $contador++;
                                                        echo($contador)?></td>
                                                <td><?php echo $item->nombre_componente ?></td>                                                
                                                <td><?php echo $item->nombre_elemento ?></td>
                                                <td><?php echo $item->tipo_valor ?></td>
                                                <td><?php echo $item->rango ?></td>
                                                <td><?php echo $item->unidad_rango ?></td>
                                                <td><?php echo $item->muestra_analisis ?></td>
                                            </tr>
                                        <?php endforeach ?>														
					<!-- End: list_row -->
					</tbody>
					<tfoot>
						<tr>
							<th>Num</th>
                                                        <th>Componente</th>
							<th>Nombre Elemento</th>                                                        
                                                        <th>Tipo Valor</th>
                                                        <th>Rango</th>
                                                        <th>Unidad Rango</th>
                                                        <th>Tipo Muestra</th>	
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

