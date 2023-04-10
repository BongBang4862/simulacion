<?php
// Conexión a la base de datos
include('conexion.php');

// Consulta para obtener los datos de los simuladores
$sql = "SELECT * FROM simuladores";
$result = mysqli_query($conexion, $sql);

// Crear un array para almacenar los datos de los simuladores
$simuladores = array();

// Recorrer el resultado de la consulta y agregar los datos al array de simuladores
while ($row = mysqli_fetch_assoc($result)) {
    $simuladores[] = $row;
}

// Devolver los datos de los simuladores en formato JSON
echo json_encode($simuladores);

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
