<?php
// Conectarse a la base de datos
include 'consultas/conexion.php';

// Obtener el ID del examen de la URL
$examen_id = $_GET['examen_id'];

// Obtener información del examen
$query = "SELECT * FROM examenes WHERE id = $examen_id";
$resultado = mysqli_query($conexion, $query);
$examen = mysqli_fetch_assoc($resultado);

// Obtener todas las preguntas asociadas al examen
$query = "SELECT * FROM preguntas WHERE examen_id = $examen_id";
$resultado = mysqli_query($conexion, $query);
$preguntas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

// Mostrar información del examen y las preguntas
echo "<h1>Examen: " . $examen['titulo'] . "</h1>";

echo "<h2>Preguntas</h2>";
echo "<ul>";
foreach ($preguntas as $pregunta) {
    echo "<li>" . $pregunta['pregunta'] . "</li>";
}
echo "</ul>";

// Formulario para agregar preguntas
echo "<h3>Agregar pregunta</h3>";
echo "<form action='agregar_pregunta.php' method='POST'>";
echo "<input type='hidden' name='examen_id' value='" . $examen_id . "'>";
echo "<label for='pregunta'>Pregunta:</label>";
echo "<textarea name='pregunta' id='pregunta'></textarea>";
echo "<button type='submit'>Agregar</button>";
echo "</form>";

// Formulario para borrar preguntas
echo "<h3>Borrar pregunta</h3>";
echo "<form action='borrar_pregunta.php' method='POST'>";
echo "<input type='hidden' name='examen_id' value='" . $examen_id . "'>";
echo "<label for='pregunta_id'>Pregunta:</label>";
echo "<select name='pregunta_id' id='pregunta_id'>";
foreach ($preguntas as $pregunta) {
    echo "<option value='" . $pregunta['id'] . "'>" . $pregunta['pregunta'] . "</option>";
}
echo "</select>";
echo "<button type='submit'>Borrar</button>";
echo "</form>";

// Cerrar conexión a la base de datos
mysqli_close($conexion);
?>
