<!DOCTYPE html>
<html>
<head>
	<title>Ingreso de alumno</title>
</head>
<body>
	<h1>Ingreso de alumno</h1>
	<form action="consultas/procesar_alumno.php" method="POST">
		<label for="nombre_completo">Nombre completo:</label>
		<input type="text" name="nombre_completo" required><br><br>
		<label for="rut">RUT:</label>
		<input type="text" name="rut" required><br><br>
		<label for="codigo_curso">Código de curso:</label>
		<input type="text" name="codigo_curso" required><br><br>
		
		<input type="submit" value="Ingresar">
	</form>
</body>
</html>
