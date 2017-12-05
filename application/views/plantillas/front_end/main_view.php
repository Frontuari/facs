<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Marcador Horario</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<meta name="description" content="Reloj para marcar la hora de entrada o de salida a una institución">
		<meta name="author" content="Ing Rafael Konig">
		<link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" /> 
		<link href="<?php echo base_url()?>assets/css/estilos.css" rel="stylesheet" type="text/css">
		<!-- Alertar con alertify-->
		<link href="<?php echo base_url()?>assets/js/alertify/themes/alertify.core.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url()?>assets/js/alertify/themes/alertify.default.css" rel="stylesheet" type="text/css">
		<script src="<?php echo base_url()?>assets/js/alertify/alertify.js"></script>
		<script>
			// buscamos el metodo para los tipos de navegadores
			function launchFullScreen(element) {
				if(element.requestFullScreen) {
					element.requestFullScreen();
				 } else if(element.mozRequestFullScreen) {
					element.mozRequestFullScreen();
				 } else if(element.webkitRequestFullScreen) {
					element.webkitRequestFullScreen();
				}
			}
		</script>
	</head>
	<body onload="javascript:launchFullScreen(document.documentElement);" style="background-color:#212121;">
		<header>
			<div class="col-md-12 text-center">
				<b>BIENVENIDO</b>
			</div>
			<div id="cintillo" class="col-md-12">
				<div class="marquesina">
					
					<ul class="col-md-12 text-center">
						<li><img src="<?=base_url()?>assets/img/LogoVenelatin2.png"  height="148" width="300"/></li>
						<li><img src="<?=base_url()?>assets/img/LogoVenelatin2.png" height="148" width="300"/></li>
					</ul>
				</div>
			</div>
		</header>
		<section>
			<?php 
				// Alertify de los mensajes q llegan hacia main/index
				if (!$this->session->flashdata('mensaje')) {
					echo '';
				 } else {
					echo '
						<script>
							alertify.alert("'.$this->session->flashdata('mensaje').'");
						</script>
					';
				} 
			?>
			<a href="" id="next" data-toggle="modal" data-target="#ventanaEditar" data-backdrop="static" title="Haga Clic o presione la tecla 'Enter' para registrar su Nombre y Hora de registro">
				<div class="clock col-md-12">
					<ul>
						<li id="hours"> </li>
						<li id="point">:</li>
						<li id="min"> </li>
						<li id="point">:</li>
						<li id="sec"> </li>
					</ul>
				</div>
			</a>
			<div id="Date" class="col-md-12 text-center"></div>
		</section>
		<!-- Con este grupo de divs se abre la ventana modal que traera la info a editar el curso-->
		<div class="modal fade" id="ventanaEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" >
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="ct"></div>
				</div>
			</div>
		</div>
		<footer>
			<b>Ing. Jorge Colmenarez - Venezuela <br /> Ing. Rafael Konig - Venezuela <br /> Ing. Juan Herrera - Perú</b>
			<p>&copy; Copyleft <?php echo date('Y'); ?> <a href="http://www.frontuari.com/" target="_blank">Desarrollado por: www.frontuari.com</a></p>
		</footer>
	</body>
</html>
<!-- JQuery por supuesto..!-->
<script src="<?php echo base_url()?>assets/js/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.0-->
<script src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
<!-- Para el manejo de la Hora con Javascript-->
<script src="<?php echo base_url()?>assets/js/moment.js"></script>
<!-- Para la carga de las imagenes y la marquesina mas moderna-->
<script src="<?php echo base_url()?>assets/js/jquery-backstretch.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.easing.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.easy-ticker.js"></script>
<script>
 	$("#saveAlertFine").delay(1500).fadeOut(900);// para mostrar las alertas y ocultarlas
 	$("#saveAlertError").delay(1500).fadeOut(900);// para mostrar las alertas y ocultarlas
</script>
<script>
	document.getElementById("next").focus();
</script>
<script>
	// Para el cycleSliderShow de las imagenes del centro
	$(document).ready(function(){
		var dd = $('.marquesina').easyTicker({
			direction: 'up',
			easing: 'easeInOutBack',
			speed: 'slow',
			interval: 9000,
			height: 'auto',
			visible: 1,
			mousePause: 0
		}).data('easyTicker');		
	});
</script>
<script>
	// Para el cycleSliderShow de las imagenes del centro
	$(document).ready(function(){
		$.backstretch([
			"<?php echo base_url()?>assets/img/primeros_rayos_sol.jpg",
			"<?php echo base_url()?>assets/img/Beautiful-scenery-in-Germany_1280x1024.jpg",
			"<?php echo base_url()?>assets/img/Dream-of-summer-scenery_1280x1024.jpg",
			"<?php echo base_url()?>assets/img/montana_flores.jpeg",
			"<?php echo base_url()?>assets/img/fondoplaya.jpg",
			"<?php echo base_url()?>assets/img/playa_hamaca.jpg",
			"<?php echo base_url()?>assets/img/paisaje super verde-875053.jpg",
			"<?php echo base_url()?>assets/img/jardin_de_girasoles.jpeg",
			"<?php echo base_url()?>assets/img/Lindo paisaje de un parque-968832.jpg"
		], {duration: 7000, fade: 750});		
	});
</script>
<script>
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
</script>
<script>
	$(document).ready(function() {
	// Create two variable with the names of the months and days in an array
	var monthNames = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]; 
	var dayNames= ["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];

	// Create a newDate() object with TimeZone Lima
	var newDate = calcTime(-5);
	// Extract the current date from Date object
	newDate.setDate(newDate.getDate());
	// Output the day, date, month and year   
	$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

	setInterval( function() {
		// Create a newDate() object and extract the seconds of the current time on the visitor's
		var seconds = calcTime(-5).getSeconds();
		// Add a leading zero to seconds value
		$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
		},1000);
		
	setInterval( function() {
		// Create a newDate() object and extract the minutes of the current time on the visitor's
		var minutes = calcTime(-5).getMinutes();
		// Add a leading zero to the minutes value
		$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
	    },1000);
		
	setInterval( function() {
		// Create a newDate() object and extract the hours of the current time on the visitor's
		var hours = calcTime(-5).getHours();
		// Add a leading zero to the hours value
		$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
	    }, 1000);	
	});
</script>
<script>
	// cuando haga clic en el boton argegar
	$('#ventanaEditar').on('shown.bs.modal', function (event) {
		$('#cedchkperson').focus();
		var modal = $(this);
		$.ajax({
				url: "<?php echo base_url()?>index.php/main/form_modal_agrega_hora",
				success: function (data) {
					console.log(data);
					modal.find('.ct').html(data);
				},
				error: function(err) {
					console.log(err);
					alert('AgregaHora'+err);
				}
		});
	});
</script>