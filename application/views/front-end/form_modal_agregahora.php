<?php 
	setlocale(LC_TIME,'es_ES.UTF-8');
	$dia = date('d-m-Y');
	$hora= date('h:i:s A');
?>
<link href="<?php echo base_url()?>assets/js/FormValidation/formValidation.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>assets/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	::-webkit-input-placeholder {
	   color: red;
	   padding-top: 9px;
	}

	:-moz-placeholder { /* Firefox 18- */
	   color: red;
	}

	::-moz-placeholder {  /* Firefox 19+ */
	   color: red;
	}

	:-ms-input-placeholder {  
	   color: red;  
	   padding-top: 9px;
	}
</style>
<form id="form-registro" action="" data-async method="post" role="form">
	<div class="modal-body col-md-12">
		<h3>
			<div class="form-group col-md-6">
				<label>Día: </label>
					<input type="text" id="diachkperson" name="diachkperson" class="form-control input-lg" value="<?php echo $dia;?>" readonly >
			</div>
			<div class="form-group col-md-6">
				<label>Hora: </label>
					<input type="text" id="horachkperson" name="horachkperson" class="form-control input-lg" value="<?php echo $hora;?>" readonly>
			</div>
			<div class="form-group col-md-12">
				<label>Cedula Empleado: </label>
					<select id="cedchkperson" name="cedchkperson" class="form-control input-lg" autofocus="on">
						<option value=""> </option>
						<?php
							// consulta para ubicar las notas del estudiante
							$personal = $this->Main_model->consult_persons();
							foreach ($personal->result() as $r) {
								echo '<option value="'.$r->cedulaperson.'">'.$r->cedulaperson.' - '.$r->apenomperson.'</option>';
							}
						?>
					</select>
			</div>
		</h3>
			<div class="modal-footer col-md-12 col-sd-3 btn-group">
				<button type="submit" name="entrada" id="entrada" class="btn btn-primary btn-large" value="entrada" 
				dir="<?php echo base_url()?>index.php/main/insertar_entrada" title="Registrar ENTRADA" >
					<i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;ENTRADA
				</button>
				<button type="submit" name="salida" id="salida" class="btn btn-danger btn-large col-md-push-1 col-sm-push-1" value="salida" dir="<?php echo base_url()?>index.php/main/insertar_salida" title="Registrar SALIDA"  >
					SALIDA&nbsp;&nbsp;<i class="glyphicon glyphicon-share-alt"></i>
				</button>
			</div>
			<div id="ajaxcontent"></div>
		</div>
	</div>
</form>
<!-- Con este grupo de divs se abre la ventana modal que traera la info a editar del estudiante-->
<div class="modal fade in" id="ventanaEnviando" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="box box-info">
				<div class="box-body">
					<div class="ct text-center">
					</div>
				</div><!-- /.box -->
			</div><!--/.box-info -->
		</div>
	</div>
</div>
<script src='<?php echo base_url()?>assets/js/FormValidation/formValidation.min.js'></script>
<script src='<?php echo base_url()?>assets/js/FormValidation/formValidation_bootstrap.min.js'></script>
<script src='<?php echo base_url()?>assets/js/FormValidation/formValidation_language_es_ES.min.js'></script>
<script src="<?php echo base_url()?>assets/js/selectize.js"></script>
<script>
	$('#cedchkperson').selectize({
		create: true,
		sortField: {
			field: 'text',
			direction: 'asc'
		},
		placeholder: 'Cedula del Empleado'
	});
</script>
<script>
	// validacion de campos
	$('#form-registro').formValidation({
	 	framework: 'bootstrap',
		 err: {
			container: 'tooltip'
		 },
		 row: {
			selector: 'div'
		},
		 /*icon: {
			valid: 'fa fa-check',
			invalid: 'fa fa-times',
			validating: 'fa fa-refresh'
		 },*/
		 excluded: ':disabled',
		 fields: {
			 cedchkperson: {
				 validators: {
					 notEmpty: {
						 message: 'La Cedula del Empleado es requerida'
					 }
				 }
			 }
		 }
	});
</script>
<script>
	// para enviar el formulario segun el boton que al que se le haga clic
	$(document).ready(function(){
		$("button[type=submit]").click(function() {
			var $frm = $('#form-registro');
			var $target = $(this).attr('dir');
				$.ajax({
					type: $frm.attr('method'),
					url:  $target,
					data: $frm.serialize(),

					success: function(data, status) {
						jQuery('#ajaxcontent').html(res);
					}
				});
		});
	});
</script>