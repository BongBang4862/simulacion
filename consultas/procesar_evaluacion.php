<?php
// Conexión a la base de datos
include 'conexion.php';

// Obtener los datos ingresados en el formulario y limpiarlos
$titulo = mysqli_real_escape_string($conexion, $_POST['titulo']);
$preguntas = mysqli_real_escape_string($conexion, $_POST['preguntas']);

// Validar que los datos no estén vacíos
if (empty($titulo) || empty($preguntas)) {
  die('Por favor, complete todos los campos');
}

// Crear la consulta SQL para registrar el examen
$sql = "INSERT INTO examenes (titulo) VALUES ('$titulo')";
if (!mysqli_query($conexion, $sql)) {
  die('Error al registrar el examen: ' . mysqli_error($conexion));
}

// Obtener el ID del examen recién registrado
$examen_id = mysqli_insert_id($conexion);

// Dividir las preguntas en un arreglo y eliminar espacios en blanco
$preguntas = explode("\\r\\n", $preguntas);
$preguntas = array_map('trim', $preguntas);
echo '<script>console.log(' . json_encode($preguntas) . ');</script>';
// Recorrer el arreglo de preguntas y registrar cada una
foreach ($preguntas as $pregunta) {
  // Crear la consulta SQL para registrar la pregunta
  $sql = "INSERT INTO preguntas (examen_id, pregunta) VALUES ('$examen_id', '$pregunta')";
  if (!mysqli_query($conexion, $sql)) {
    die('Error al registrar la pregunta: ' . mysqli_error($conexion));
  }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

echo 'El examen se ha registrado correctamente';
header('Location: ../sistema.php')
?>
