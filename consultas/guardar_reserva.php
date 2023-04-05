<?php
// Conexión a la base de datos
include('consultas/conexion.php');

// Recuperar los datos enviados por POST
$nombre = $_POST['nombre'];
$simulador = $_POST['simulador'];
$fecha = $_POST['fecha'];
$horaInicio = $_POST['hora_inicio'];
$horaFinal = $_POST['hora_final'];

// Insertar la reserva en la base de datos
$sql = "INSERT INTO reservas_simuladores (alumno_id, simulador_id, fecha, hora_inicio, hora_final) VALUES ((SELECT id FROM alumnos WHERE nombre_completo = '$nombre'), (SELECT id FROM simuladores WHERE nombre_simulador = '$simulador'), '$fecha', '$horaInicio', '$horaFinal')";
$result = mysqli_query($conexion, $sql);

mysqli_close($conexion);
?>
