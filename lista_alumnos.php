<?php
  // Conexión a la base de datos
  include ('consultas/conexion.php');

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
