<?php
// Conectarse a la base de datos
include 'conexion.php';

// Obtener los datos del formulario
$examen_id = $_POST['examen_id'];
$pregunta = $_POST['pregunta'];

// Insertar la pregunta en la base de datos
$query = "INSERT INTO preguntas (pregunta, examen_id) VALUES ('$pregunta', $examen_id)";
mysqli_query($conexion, $query);

// Redirigir al examen
header("Location: ../mostrar_examen.php?examen_id=$examen_id");

// Cerrar conexión a la base de datos
mysqli_close($conexion);
?>
