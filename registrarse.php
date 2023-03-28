<!DOCTYPE html>
<html>
<head>
	<title>Registro de usuarios</title>
</head>
<body>
	<h1>Registro de usuarios</h1>
	<form action="consultas/sing_in.php" method="POST">
		<label for="nombre">Nombre:</label>
		<input type="text" name="nombre" required>
		<br>
		<label for="apellido">Apellido:</label>
		<input type="text" name="apellido" required>
		<br>
		<label for="email">Correo electrónico:</label>
		<input type="email" name="email" required>
		<br>
		<label for="password">Contraseña:</label>
		<input type="password" name="password" required>
		<br>
		<button type="submit">Registrarse</button>
	</form>
</body>
</html>