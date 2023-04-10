<?php
// Conexión a la base de datos
include('conexion.php');

// Consulta de las reservas
$sql = "SELECT rs.id, a.nombre_completo, s.nombre_simulador, s.color, rs.fecha, rs.hora_inicio, rs.hora_final FROM reservas_simuladores rs INNER JOIN alumnos a ON rs.alumno_id = a.id INNER JOIN simuladores s ON rs.simulador_id = s.id";
$result = mysqli_query($conexion, $sql);

// Formateo de los datos en formato JSON
$events = array();
while ($row = mysqli_fetch_assoc($result)) {
    $event = array();
    $event['id'] = $row['id'];
    $event['title'] = $row['nombre_completo'] . ' - ' . $row['nombre_simulador'];
    $event['start'] = $row['fecha'] . 'T' . $row['hora_inicio'];
    $event['end'] = $row['fecha'] . 'T' . $row['hora_final'];
    $event['color'] = $row['color'];
    $events[] = $event;
}
echo json_encode($events);
mysqli_close($conexion);
?>
