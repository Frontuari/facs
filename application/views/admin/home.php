					<!-- LISTIN EMPLOYED -->
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-report"></i>&nbsp;<?=$title?></h3>
						<h2 class="panel-subtitle"><?=$subtitle?></h2>
					</div>
					<div class="panel-body">

						<div id="table_holder">
							<table id="table"></table>
						</div>

						<div id="report_summary">
							<?php
							foreach($summary_data as $name=>$value)
							{
							?>
								<div class="summary_row"><?php echo 'reports_'.$name. ': '.to_currency($value); ?></div>
							<?php
							}
							?>
						</div>

						<script type="text/javascript">
							$(document).ready(function()
							{
							    $.fn.bootstrapTable.locales['es'] = {
									formatLoadingMessage: function () {
										return "Por favor espere...";
									},
									formatRecordsPerPage: function (pageNumber) {
										return "{0} resultados por página".replace('{0}', pageNumber);
									},
									formatShowingRows: function (pageFrom, pageTo, totalRows) {
										return "Mostrando desde {0} hasta {1} - En total {2} resultados".replace('{0}', pageFrom).replace('{1}', pageTo).replace('{2}', totalRows);
									},
									formatSearch: function () {
										return "Buscar";
									},
									formatNoMatches: function () {
										return "No hay empleados que mostrar";
									},
									formatPaginationSwitch: function () {
										return "Ocultar/Mostrar paginación";
									},
									formatRefresh: function () {
										return "Refrescar";
									},
									formatToggle: function () {
										return "Ocultar/Mostrar";
									},
									formatColumns: function () {
										return "Columnas";
									},
									formatAllRows: function () {
										return "Todos";
									},
									formatConfirmDelete : function() {
										return "¿Estás seguro(a) de querer borrar los empleados seleccionados?";
									}
							    };

								$.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['es']);

								$('#table').bootstrapTable({
									columns: <?php echo transform_headers($headers, TRUE, FALSE); ?>,
									pageSize: 10,
									striped: true,
									sortable: true,
									showExport: true,
									pagination: true,
									showColumns: true,
									showExport: true,
									data: <?php echo json_encode($data); ?>,
									iconSize: 'sm',
									paginationVAlign: 'bottom',
									escape: false
								});

							});
						</script>
					</div>