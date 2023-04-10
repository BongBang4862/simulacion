<?php
// Conexión a la base de datos
include('conexion.php');

// Obtener datos de la petición AJAX
$simulador = $_POST['simulador'];
$fecha = $_POST['fecha'];
$horaInicio = $_POST['horaInicio'];
$horaFinal = $_POST['horaFinal'];

// Consultar la base de datos para ver si el simulador está disponible en la fecha y hora seleccionadas

$sql = "SELECT COUNT(*) AS num_reservas FROM reservas_simuladores WHERE simulador_id = '$simulador' AND fecha = '$fecha' AND (hora_inicio < '$horaFinal' AND hora_final > '$horaInicio')";

$result = mysqli_query($conexion, $sql);
$row = mysqli_fetch_assoc($result);
$count = $row['num_reservas'];

// Devolver respuesta en formato JSON
if ($count == 0) {
    $response = array('disponible' => true);
} else {
    $response = array('disponible' => false);
}
echo json_encode($response);

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
