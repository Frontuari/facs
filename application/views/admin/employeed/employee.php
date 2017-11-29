<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title"><i class="fa fa-person"></i> Formularios / Reportes</h3>
	</div>
	<?php if(!empty($this->session->flashdata('msg'))):?>
		<script type="text/javascript">alerta("<?=$this->session->flashdata('msg')?>");</script>
	<?php endif;?>
	<div class="panel-body">
		<table class="table table-hover datatables">
			<p class="demo-button">
				<a href="<?=base_url()?>index.php/employees/add" class="btn btn-success"><i class="fa fa-plus-square"></i> Agregar </a>
			</p>
			<thead>
				<tr>
					<th>#</th>
					<th>DNI</th>
					<th>Nombres y Apellidos</th>
					<th>Género</th>
					<th>Correo Eléctronico</th>
					<th>Activo</th>
					<th>Editar</th>
					<th>Activar /<br>Desactivar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($employees as $employee): ?>
				<tr>
					<td><?=$employee->idperson?></td>
					<td><?=$employee->dni?></td>
					<td><?=$employee->name?></td>
					<td><?=$employee->gender == "F" ? 'Femenino' : 'Masculino' ?></td>
					<td><?=$employee->email?></td>
					<td><?= $employee->status?></td>
					<?php if($employee->status=="ACTIVO"):?>
						<td><a href="<?=base_url()?>index.php/employees/edit/<?=$employee->idperson?>"><i class="fa fa-edit"></i></a></td>
						<td><a href="<?=base_url()?>index.php/employees/remove/<?=$employee->idperson?>/N"><i class="fa fa-remove"></i></a></td>
					<?php else:?>
						<td><a href="javascript: void(0)"><i class="fa fa-edit"></i></a></td>
						<td><a href="<?=base_url()?>index.php/employees/remove/<?=$employee->idperson?>/Y"><i class="fa fa-check"></i></a></td>
					<?php endif;?>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>