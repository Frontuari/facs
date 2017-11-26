<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Marcador Horario</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<meta name="description" content="Reloj para marcar la hora de entrada o de salida a una institución">
		<meta name="author" content="T.S.U. Angel Emiro Antunez Villasmil">
		<link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" /> 
		<link href="<?php echo base_url()?>assets/css/estilos.css" rel="stylesheet" type="text/css">
		<!-- Alertar con alertify-->
		<link href="<?php echo base_url()?>assets/js/alertify/themes/alertify.core.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url()?>assets/js/alertify/themes/alertify.default.css" rel="stylesheet" type="text/css">
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
	<body onload="javascript:launchFullScreen(document.documentElement);">
		<header>
			<div class="col-md-12 text-center">
				<b>BIENVENID@.!</b>
			</div>
			<div id="cintillo" class="col-md-12">
				<div class="marquesina" >
					<ul class="col-md-12 text-center">
						<li>"La única forma de hacer un trabajo excelente es haciendo lo que amas". Steve Jobs </li>
						<li>"Puede que debas pelear una batalla más de una vez para ganarla". Margaret Thatcher </li>
						<li>"Te conviertes en aquello en lo que crees". Oprah Winfrey </li>
						<li>"La felicidad no es algo hecho. Viene de nuestras acciones". Dalai Lama </li>
						<li>"Si ves a alguien sin una sonrisa, dale la tuya". Dolly Parton </li>
						<li>"La vida es muy interesante... Al final, algunas de las cosas que más nos lastiman se convierten en nuestras mayores fortalezas". Drew Barrymore </li>
						<li>"Si amas la vida, no pierdas el tiempo, ya que de tiempo está hecha la vida". Bruce Lee </li>
						<li>"La vida es eso que te sucede mientras estás ocupado haciendo otros planes". John Lennon </li>
						<li>"Con el tiempo, la fama se me va a escapar. Se escapa de todos y lo único que te queda al final es la posibilidad de mirar atrás y ver las decisiones que tomaste". Matt Damon </li>
						<li>"Todos seguimos soñando y, por suerte, los sueños sí se hacen realidad". Katie Holmes </li>
						<li>"Creo que existe un poder interior que hace ganadores y perdedores. Y los ganadores son los que pueden realmente escuchar la verdad en sus corazones". Sylvester Stallone </li>
						<li>"En la vida no hay arrepentimientos. Solo lecciones". Jennifer Aniston </li>
						<li>"La imagen es una cosa y el ser humano es otra. Es muy difícil vivir a la altura de una imagen, digámoslo así". Elvis Presley </li>
						<li>"Odié cada momento del entrenamiento, pero dije: 'No renuncies. Sufre ahora y vive el resto de tu vida como un campeón'". Muhammad Ali </li>
						<li>"Una persona está sentada a la sombra hoy porque alguien plantó un árbol mucho tiempo atrás". Warren Buffett </li>
						<li>"Soñemos con el mañana donde podamos amar realmente desde el alma y sepamos que el amor es la verdad máxima en el corazón de toda la creación". Michael Jackson </li>
						<li>"Si aceptas las expectativas de otros, sobre todo las negativas, entonces nunca podrás cambiar el resultado<li>" Michael Jordan </li>
						<li>"Aprender a estar quieto, realmente quieto y dejar que la vida suceda... esa quietud se convierte en un resplandor". Morgan Freeman </li>
						<li>"Ochenta por ciento del éxito radica en estar". Woody Allen </li>
						<li>"La gente olvidará lo que dijiste. Olvidarán lo que hiciste. Pero nunca olvidarán cómo los hiciste sentir". Maya Angelou </li>
						<li>"Siempre parece imposible hasta que está hecho". Nelson Mandela </li>
						<li>"La diferencia entre lo ordinario y lo extraordinario es ese algo extra". Jimmy Johnson </li>
						<li>"Soñar, a fin de cuentas, es una forma de planificar". Gloria Steinem </li>
						<li>"Es tu lugar en el mundo, es tu vida. Ve y haz lo que puedas con ella y conviértela en la vida que quieras vivir". Mae Jemison </li>
						<li>"Cuanto más duro trabajo, más suerte tengo". Gary Player </li>
						<li>"Los campeones siguen jugando hasta que les sale bien". Billie Jean King </li>
						<li>"Siempre has un esfuerzo pleno, incluso cuando tengas todo en contra". Arnold Palmer </li>
						<li>"El éxito es ir de fracaso en fracaso sin perder el entusiasmo". Winston Churchill </li>
						<li>"Intenta no convertirte en una persona exitosa, en cambio, intenta convertirte en una persona valiosa". Albert Einstein </li>
						<li>"Todos nuestros sueños se pueden hacer realidad si tenemos el coraje de seguirlos". Walt Disney </li>
						<li>"Las cosas funcionan mejor para aquellos que sacan lo mejor de cómo funcionan las cosas". John Wooden </li>
						<li>"Debes convertirte en el cambio que deseas ver en el mundo". Mahatma Gandhi </li>
						<li>"No preguntes qué puede hacer tu país por ti... pregunta qué puedes hacer tú por tu país". John F. Kennedy </li>
						<li>"Un niño, un profesor, un libro, un bolígrafo pueden cambiar el mundo". Malala Yousafzai </li>
						<li>"Cuando aparece un momento decisivo, define el momento o el momento te definirá a ti". Kevin Costner </li>
						<li>"La mejor vista es la interior". Malcolm Forbes </li>
						<li>"La persona más patetica en el mundo es aquella que tiene vista pero no visión". Helen Keller </li>
						<li>"En los negocios, lo peligroso es no evolucionar". Jeff Bezos </li>
						<li>"Si estás cambiando el mundo, estás haciendo cosas importantes. Te emociona despertarte a la mañana". Larry Page </li>
						<li>"El gran don de los humanos es que tenemos el poder de la empatía". Meryl Streep </li>
						<li>"Si no pides, no consigues". Stevie Wonder </li>
						<li>"Al final, no recordaremos las palabras de nuestros enemigos, sino el silencio de nuestros amigos". Martin Luther King Jr. </li>
						<li>"Si es la silla correcta, no toma demasiado tiempo sentirse cómodo en ella". Robert De Niro </li>
						<li>"La fama no te llena. Te abriga un poco, pero ese calor es temporario". Marilyn Monroe </li>
						<li>"Nunca aprendes demasiado escuchándote hablar". George Clooney </li>
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
		<div class="modal fade" id="ventanaEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="ct"></div>
				</div>
			</div>
		</div>
		<footer>
			<b>C.E.I. CORONEL MIGUEL ANTONIO VAZQUEZ - MARACAIBO, VENEZUELA</b>
			<p>&copy; Angel Emiro Antunez Villasmil 2015</p>
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
<!-- Alertar con alertify-->
	<script src="<?php echo base_url()?>assets/js/alertify/alertify.js"></script>
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
	$(document).ready(function() {
	// Create two variable with the names of the months and days in an array
	var monthNames = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]; 
	var dayNames= ["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];

	// Create a newDate() object
	var newDate = new Date();
	// Extract the current date from Date object
	newDate.setDate(newDate.getDate());
	// Output the day, date, month and year   
	$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

	setInterval( function() {
		// Create a newDate() object and extract the seconds of the current time on the visitor's
		var seconds = new Date().getSeconds();
		// Add a leading zero to seconds value
		$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
		},1000);
		
	setInterval( function() {
		// Create a newDate() object and extract the minutes of the current time on the visitor's
		var minutes = new Date().getMinutes();
		// Add a leading zero to the minutes value
		$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
	    },1000);
		
	setInterval( function() {
		// Create a newDate() object and extract the hours of the current time on the visitor's
		var hours = new Date().getHours();
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