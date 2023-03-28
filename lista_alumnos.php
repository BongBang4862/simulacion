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

  // Consulta SQL para obtener todos los alumnos
  $sql = "SELECT * FROM alumnos";
  $resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Lista de alumnos</title>
</head>
<body>
  
</body>
</html>

<?php
  // Cerrar la conexión a la base de datos
  mysqli_close($conexion);
?>
