<!DOCTYPE html SYSTEM >
<html xmlns="http://www.w3.org/1999/xhtml" hasBrowserHandlers="true">
	<head xmlns="http://www.w3.org/1999/xhtml">
		<title>Problema Cargando el Sistema</title>
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/netError.css" type="text/css" media="all" />
		<link rel="icon" type="image/png" id="favicon" href="<?php echo base_url()?>assets/img/warning-16.png" />
	</head>
	<body xmlns="http://www.w3.org/1999/xhtml" dir="ltr"><!-- PAGE CONTAINER (for styling purposes only) -->
		<div id="errorPageContainer"> <!-- Error Title -->
			<div id="errorTitle">
				<h1 id="errorTitleText">Problemas con la Fecha del Sistema Operativo</h1>
			</div> <!-- LONG CONTENT (the section most likely to require scrolling) -->
			<div id="errorLongContent"><!-- Short Description -->
				<div id="errorShortDesc">
				  <p id="errorShortDescText">La Fecha del Sistema Operativo es anterior a la ultima fecha guardada en este Programa.</p>
				  <p id="errorLongDesc">La causa de este error se debe a que:</p>
				</div>
				<!-- Long Description (Note: See netError.dtd for used XHTML tags) -->
				<div id="errorLongDesc">
					<ul>
					  <li>Es posible que se haya realizado un cambio programado en la fecha del computador</li>
					  <li>Es posible que la pila de la tarjeta madre esté agotada y por eso se pierde la fecha del sistema.</li>
					  <li>Es posible que la ultima fecha guardada esté en blanco debido a que es primera vez que se usa el sistema.</li>
					</ul>
				</div>
				<div id="errorLongDesc">
					<ul>
					  <p>Para continuar usando el sistema debe corregir la fecha del sistema.</p>
					  <p>Posteriormente puede volver aqui y presionar la techa F5, recargar la pagina o cerrar y volver a abrir el navegador.</p>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>