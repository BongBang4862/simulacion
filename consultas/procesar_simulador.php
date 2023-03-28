<?php
// Conexión a la base de datos
$host = 'localhost';
$usuario = 'root';
$password = '';
$bd = 'simulacion';

$conexion = mysqli_connect($host, $usuario, $password, $bd);
if (!$conexion) {
  die('Error de conexión: ' . mysqli_connect_error());
}

// Obtener los datos ingresados en el formulario y limpiarlos
$nombre_simulador = mysqli_real_escape_string($conexion, $_POST['nombre_simulador']);
$detalle = mysqli_real_escape_string($conexion, $_POST['detalle']);

// Validar que los datos no estén vacíos
if(empty($nombre_simulador)) {
  die('Por favor, ingrese un nombre de simulador');
}

// Verificar si ya existe un simulador con el mismo nombre
$sql = "SELECT * FROM simuladores WHERE nombre_simulador = '$nombre_simulador'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_num_rows($resultado) > 0) {
  die('Ya existe un simulador con este nombre');
}

// Insertar el nuevo simulador en la base de datos
$sql = "INSERT INTO simuladores (nombre_simulador, detalle) VALUES ('$nombre_simulador', '$detalle')";
if(mysqli_query($conexion, $sql)) {
  echo 'Simulador registrado exitosamente';
  header("Location: ../sistema.php");
} else {
  echo 'Error al registrar el simulador: ' . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
