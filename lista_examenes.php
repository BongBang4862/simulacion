<?php
// Conexión a la base de datos
include 'consultas/conexion.php';

// Consulta SQL para obtener la lista de exámenes
$sql = "SELECT id, titulo FROM examenes";
$resultado = mysqli_query($conexion, $sql);

// Si la consulta arrojó resultados, mostrar la lista de exámenes
if (mysqli_num_rows($resultado) > 0) {
    echo "<ul>";
    while($fila = mysqli_fetch_assoc($resultado)) {
        echo "<li><a href='mostrar_examen.php?examen_id={$fila['id']}'>{$fila['titulo']}</a></li>";
    }
    echo "</ul>";
} else {
    echo "No se encontraron exámenes.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
