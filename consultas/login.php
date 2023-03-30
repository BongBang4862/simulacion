<?php
  // Conexión a la base de datos
  include 'conexion.php';

  // Obtener los datos ingresados en el formulario y limpiarlos
  $email = mysqli_real_escape_string($conexion, $_POST['email']);
  $password = mysqli_real_escape_string($conexion, $_POST['password']);

  // Validar que los datos no estén vacíos
  if(empty($email) || empty($password)) {
      die('Por favor, complete todos los campos');
  }

  // Consulta preparada SQL para verificar las credenciales del usuario
  $sql = "SELECT * FROM administradores WHERE email = ?";
  $stmt = mysqli_prepare($conexion, $sql);
  mysqli_stmt_bind_param($stmt, "s", $email );
  mysqli_stmt_execute($stmt);
  $resultado = mysqli_stmt_get_result($stmt);
  // Verificar si se encontró un registro con las credenciales ingresadas
  if (mysqli_num_rows($resultado) == 1) {
     $usuario = mysqli_fetch_assoc($resultado);
    if (password_verify($password, $usuario['password'])) {
        // El usuario es válido, redirigir al sistema
        session_start();
        $_SESSION['id_usuario'] = $usuario['id'];
        $_SESSION['nombre_usuario'] = $usuario['nombre'];
        header('Location: ../sistema.php');
        exit();
    } else {
        // La contraseña no es válida, mostrar mensaje de error
        echo "Contraseña incorrecta";
    }
  } else {
    // El usuario no es válido, mostrar mensaje de error
    echo "Nombre de usuario o contraseña incorrectos";
  }

  // Cerrar la consulta preparada y la conexión a la base de datos
  mysqli_stmt_close($stmt);
  mysqli_close($conexion);
?>