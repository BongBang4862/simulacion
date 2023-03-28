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
  $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
  $apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
  $email = mysqli_real_escape_string($conexion, $_POST['email']);
  $password = mysqli_real_escape_string($conexion, $_POST['password']);
  $password_hash = password_hash($password, PASSWORD_DEFAULT);
  echo $password_hash;
  // Verificar que el correo electrónico no esté registrado previamente
  $sql = "SELECT * FROM administradores WHERE email = '$email'";
  $resultado = mysqli_query($conexion, $sql);
  if (mysqli_num_rows($resultado) > 0) {
    die('El correo electrónico ya está registrado');
  }

  // Insertar los datos en la base de datos
  $sql = "INSERT INTO administradores (nombre, apellido, email, password) VALUES ('$nombre', '$apellido', '$email', '$password_hash')";
  if (mysqli_query($conexion, $sql)) {
    echo 'Registro exitoso';
    header('Location: ../index.php');
  } else {
    echo 'Error al registrar los datos: ' . mysqli_error($conexion);
  }

  // Cerrar la conexión a la base de datos
  mysqli_close($conexion);
?>
