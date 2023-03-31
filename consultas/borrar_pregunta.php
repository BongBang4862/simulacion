<?php
// Conectarse a la base de datos
include 'conexion.php';

// Obtener los datos del formulario
$examen_id = $_POST['examen_id'];
$pregunta_id = $_POST['pregunta_id'];

// Borrar la pregunta de la base de datos
$query = "DELETE FROM preguntas WHERE id = $pregunta_id";
mysqli_query($conexion, $query);

// Redirigir al examen
header("Location: ../mostrar_examen.php?examen_id=$examen_id");

// Cerrar conexión a la base de datos
mysqli_close($conexion);
?>