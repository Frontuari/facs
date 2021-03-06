<?php 
	setlocale(LC_TIME,'es_PE.UTF-8');
	$dia = date('d-m-Y');
	$hora= date('h:i:s A');
?>
<link href="<?php echo base_url()?>assets/js/FormValidation/formValidation.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>assets/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>assets/css/chkinchkout_style.css" rel="stylesheet" type="text/css" />
<form id="form-registro" action="<?php echo base_url()?>index.php/main/insertar_registro" method="post" role="form">
	<div class="modal-header text-center">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h3 class="modal-title">Registrar Hora de Entrada - Salida</h3>
	</div>
	<div class="modal-body col-md-12">
		<h3>
			<div class="form-group col-md-6">
				<label>Día: </label>
					<input type="text" id="diachkperson" name="diachkperson" class="form-control input-lg text-center" value="<?php echo $dia;?>" readonly >
			</div>
			<div class="form-group col-md-6">
				<label>Hora: </label>
					<input type="text" id="horachkperson" name="horachkperson" class="form-control input-lg text-center" value="<?=$hora?>" readonly>
			</div>
			
			<div class="form-group col-md-6">
				<label>DNI Empleado: </label>				
				<input type="text" id="cedchkperson" name="cedchkperson"  class="form-control input-lg text-center">
			</div>
			<div class="form-group col-md-6">
				<label>Contraseña: </label>
				<input type="password" id="passwd" name="passwd"  class="form-control input-lg text-center">
			</div>
		</h3>
		<div class="modal-footer col-md-12 col-sd-3 btn-group">
			<button 
				type="submit" 
				name="posteo" 
				id="posteo" 
				class="btn btn-primary btn-large" 
				value="ENTRADA"
				title="Registrar ENTRADA" >
				<i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;ENTRADA
			</button>
			<button 
				type="submit" 
				name="posteo" 
				id="posteo" 
				class="btn btn-danger btn-large col-md-push-1 col-sm-push-1" 
				value="SALIDA" 
				title="Registrar SALIDA" >SALIDA&nbsp;&nbsp;
				<i class="glyphicon glyphicon-share-alt"></i>
			</button>
		</div>
		<div id="ajaxcontent"></div>
		</div>
	</div>
</form>
<script src='<?php echo base_url()?>assets/js/FormValidation/formValidation.min.js'></script>
<script src='<?php echo base_url()?>assets/js/FormValidation/formValidation_bootstrap.min.js'></script>
<script src='<?php echo base_url()?>assets/js/FormValidation/formValidation_language_es_ES.min.js'></script>
<script src="<?php echo base_url()?>assets/js/selectize.js"></script>
<!-- <script>
	$('#cedchkperson').selectize({
		create: true,
		sortField: {
			field: 'text',
			direction: 'asc'
		},
		placeholder: 'DNI del Empleado'
	});
</script> -->
<script type="text/javascript">
	/*$(document).ready(function() {
		$('#horachkperson').val(formatDate());
	});*/
	function calcTime(offset) {
	    // creamos el objeto Date (la selecciona de la máquina cliente)
	    d = new Date();
	 
	    // lo convierte  a milisegundos
	    // añade la dirferencia horaria
	    // recupera la hora en formato UTC
	    utc = d.getTime() + (d.getTimezoneOffset() * 60000);
	 
	    // crea un nuevo objeto Date usando la diferencia dada.
	    nd = new Date(utc + (3600000*offset));
	 
	    // devuelve la hora con la nueva zona horaria.
	    return nd;
	}

	function formatDate() {
	  var d = calcTime(-5);
	  var hh = d.getHours();
	  var m = d.getMinutes();
	  var s = d.getSeconds();
	  var dd = "AM";
	  var h = hh;
	  if (h >= 12) {
	    h = hh - 12;
	    dd = "PM";
	  }
	  if (h == 0) {
	    h = 12;
	  }
	  m = m < 10 ? "0" + m : m;

	  s = s < 10 ? "0" + s : s;

	  return hh+":"+m+":"+s+" "+dd;
	}
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
			 },
			 passwd: {
				validators: {
					notEmpty: {
						message: 'La Contraseña es requerida'
					},
					remote: {
						url: '<?=base_url()?>index.php/main/check_employeed',
						//	Send {cedchkperson: 'its value',passwd: 'its value'}
						data: function(validator, $field, value){
							return {
								cedchkperson: validator.getFieldElements('cedchkperson').val(),
								passwd: validator.getFieldElements('passwd').val()
							};
						},
						message: 'Contraseña invalida',
						type: 'POST'
					}
				}
			 }
		 }
	})
	.on('err.validator.fv', function(e,data){
		console.log(data);
	})
	.on('success.form', function(e){
		e.preventDefault(); //DETENER el comportamiento estandar del "action"
	    var postData = $(this).serializeArray();// con esto revisa todo lo que sea posteable en el form y lo recoje en una variable
	    var formURL = $(this).attr("action");
	    $.ajax(
	    {
	        url : formURL,
	        type: "POST",
	        data : postData,
	        success:function(data, textStatus, jqXHR) 
	        {
	            $("#ventanaEditar").modal("hide");
	            $("#ajaxcontent").html(data);

	        },
	        error: function(jqXHR, textStatus, errorThrown) 
	        {
	        	console.log(jqXHR);
	            alertify.alert("Error al procesar la petición: "+errorThrown);
	        }
	    });
	});
</script>
<script>
</script>