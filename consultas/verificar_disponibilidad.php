<?php
// Conexión a la base de datos
include('conexion.php');

// Obtener datos de la petición AJAX
$simulador = $_POST['simulador'];
$fecha = $_POST['fecha'];
$horaInicio = $_POST['hora_inicio'];
$horaFinal = $_POST['hora_final'];

echo $simulador;
// Consultar la base de datos para ver si el simulador está disponible en la fecha y hora seleccionadas
$sql = "SELECT COUNT(*) AS num_reservas FROM reservas_simuladores WHERE simulador_id = '$simulador' AND fecha = '$fecha' AND ((hora_inicio <= '$horaInicio' AND hora_final >= '$horaInicio') OR ($hora_inicio <= '$horaFinal' AND hora_final >= '$horaFinal'))";
$result = mysqli_query($conexion, $sql);
$row = mysqli_fetch_assoc($result);
$count = $row['count'];

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
