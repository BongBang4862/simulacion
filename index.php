
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Inicio de sesión</title>
</head>
<body>
  <?php
    session_start();

    if (isset($_SESSION['nombre_usuario'])) {
      header('Location: sistema.php');
      exit;
    }

  ?>
  <h1>Iniciar sesión como administrador</h1>
  <form method="post" action="consultas/login.php">
    <label for="email">Correol Electronico:</label>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required><br>
    <input type="submit" value="Ingresar">
  </form>
  <a href="registrarse.php">Registrarse</a>
</body>
</html>
