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
								<?php $this->load->view('admin/templates/frontend/bootstrap_tables_locale'); ?>

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