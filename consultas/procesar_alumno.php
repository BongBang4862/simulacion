<?php
// Conexión a la base de datos
$host = 'localhost';
$usuario = 'root';
$password = '';
$bd = 'simulacion';

$conexion = mysqli_connect($host, $usuario, $password, $bd);
if (!$conexion) {
	die('Error de conexión: ' . mysqli_connect_error());
}

// Obtener los datos ingresados en el formulario y limpiarlos
$nombre_completo = mysqli_real_escape_string($conexion, $_POST['nombre_completo']);
$rut = mysqli_real_escape_string($conexion, $_POST['rut']);
$codigo_curso = mysqli_real_escape_string($conexion, $_POST['codigo_curso']);

$sql = "SELECT * FROM alumnos WHERE rut = '$rut'";
$resultado = mysqli_query($conexion, $sql);
if (mysqli_num_rows($resultado) > 0) {
die('El RUT ya está registrado');
}
// Insertar los datos en la base de datos
$sql = "INSERT INTO alumnos (nombre_completo, rut, codigo_curso, fecha_alta) VALUES ('$nombre_completo', '$rut', '$codigo_curso', CURRENT_DATE())";
if (mysqli_query($conexion, $sql)) {
	echo 'Alumno ingresado correctamente';
	header("Location: ../sistema.php");
} else {
	echo 'Error al ingresar el alumno: ' . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
