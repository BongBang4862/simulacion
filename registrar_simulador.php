<!DOCTYPE html>
<html>
<head>
	<title>Registro de Simuladores</title>
</head>
<body>
	<?php 
    	include 'consultas/verificacion.php';

	 ?>
	<h1>Registro de Simuladores</h1>
	<form action="consultas/procesar_simulador.php" method="post">
		<label for="nombre_simulador">Nombre del Simulador:</label>
		<input type="text" id="nombre_simulador" name="nombre_simulador" required><br><br>
		<label for="detalle">Detalle:</label>
		<textarea id="detalle" name="detalle" rows="4" cols="50"></textarea><br><br>
		<input type="submit" value="Registrar">
	</form>
</body>
</html>
