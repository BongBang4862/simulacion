<?php
// Conexión a la base de datos
include('conexion.php');

// Recuperar los datos enviados por POST
$nombre = $_POST['nombre'];
$alumno_id = $_POST['alumno_id'];
$simulador = $_POST['simulador'];
$fecha = $_POST['fecha'];
$horaInicio = $_POST['horaInicio'];
$horaFinal = $_POST['horaFinal'];

// Insertar la reserva en la base de datos
$sql = "INSERT INTO reservas_simuladores (alumno_id, simulador_id, fecha, hora_inicio, hora_final) VALUES ('$alumno_id', '$simulador', '$fecha', '$horaInicio', '$horaFinal')";
$result = mysqli_query($conexion, $sql);
if ($result) {
	echo 'exito';
}else{
	echo 'fake';
}

mysqli_close($conexion);
?>
