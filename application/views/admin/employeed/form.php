<div class="panel">
	<div class="panel-heading">
		<h3><i class="fa fa-television"></i> <?php print $title; ?></h3>
	</div>
	<?php if(!empty($this->session->flashdata('msg'))):?>
		<script type="text/javascript">alertify.alert("<?=$this->session->flashdata('msg')?>");</script>
	<?php endif;?>
	<div class="panel-body">
		<div align="center" style="color:red"><?php echo validation_errors(); ?></div>
		<?php print form_open("employees/save/".$employees->idperson); ?>
			<div class="form-group">
				<label for="dni" class="label label-default">DNI: </label>
				<input type="hidden" name="employee_dni" value="<?=$employees->dni?>">
				<input type="text" id="dni" name="dni" class="form-control" value="<?=$employees->dni?>" required>
			</div>
			<div class="form-group">
				<label for="name" class="label label-default">Nombres y Apellidos: </label>
				<input type="text" id="name" name="name" class="form-control" value="<?=$employees->name?>" required>
			</div>
			<div class="form-group">
				<label for="passwd" class="label label-default">Contraseña: </label>
				<input type="password" id="passwd" name="passwd" class="form-control" value="<?=$employees->passwd?>" required>
			</div>
			<div class="form-group">
				<label for="gender" class="label label-default">Género: </label>
				<select class="form-control" id="gender" name="gender" >
					<option value=NULL <?php echo (empty($employees->gender) ? "selected" : "");?>>Seleccione una opción</option>
					<option value="F" <?php echo ($employees->gender == "F" ? "selected" : "");?>>Femenino</option>
					<option value="M" <?php echo ($employees->gender == "M" ? "selected" : "");?>>Masculino</option>
				</select>
			</div>
			<div class="form-group">
				<label for="address" class="label label-default">Dirección de Habitación: </label>
				<textarea id="address" name="address" class="form-control"  ><?=$employees->address?></textarea>
			</div>
			<div class="form-group">
				<label for="birthday" class="label label-default">Fecha Nacimiento: </label>
				<input type="date" id="birthday" name="birthday" class="form-control" value="<?=$employees->birthday?>" >
			</div>
			<div class="form-group">
				<label for="place_birth" class="label label-default">Lugar Nacimiento: </label>
				<input type="text" id="place_birth" name="place_birth" class="form-control" value="<?=$employees->place_birth?>" >
			</div>
			<div class="form-group">
				<label for="email" class="label label-default">Correo Electrónico: </label>
				<input type="text" id="email" name="email" class="form-control" value="<?=$employees->email?>" required>
			</div>
			<div class="form-group">
				<label for="level_education" class="label label-default">Nivel de Educación: </label>
				<input type="text" id="leve_education" name="level_education" class="form-control" value="<?=$employees->level_education?>" >
			</div>
			<div class="form-group">
				<label for="charge" class="label label-default">Cargo: </label>
				<input type="text" id="charge" name="charge" class="form-control" value="<?=$employees->charge?>" >
			</div>
			<div class="form-group">
				<label for="phone_number" class="label label-default">Nro Télefono: </label>
				<input type="text" id="phone_number" name="phone_number" class="form-control" value="<?=$employees->phone_number?>" >
			</div>
			<div class="form-group">
				<label for="mobile_phone" class="label label-default">Nro Celular: </label>
				<input type="text" id="mobile_phone" name="mobile_phone" class="form-control" value="<?=$employees->mobile_phone?>" >
			</div>
			<input type="hidden" id="status" name="status" value="<?=isset($employees->status) ? 'Y' : 'N' ?>">
			<button type="submit" value="<?=$action?>" name="event" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
			<button type="button" class="btn btn-info" onclick="volver('<?=base_url()?>index.php/employees')"><i class="fa fa-reply"></i> Volver</button>
		<?php print form_close(); ?>
	</div>