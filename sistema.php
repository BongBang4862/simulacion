<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Inicio de sesión</title>
</head>
<body>
 
  <?php
    include 'consultas/verificacion.php';

    // Si hay una sesión iniciada, muestra el contenido de la página principal
    echo "Bienvenido " . $_SESSION['nombre_usuario'] . "! Aquí está el contenido de la página principal.";

  ?>

  <a href="registrar_alumno.php"> Registrar Alumno</a>
  <a href="registrar_simulador.php"> Registrar Simulador</a>
  <a href="crear_evaluacion.php"> Crear Evaluaciones</a>

  <a href="consultas/logout.php"> Salir</a>

  <h1>Lista de alumnos registrados</h1>
  <table>
    <thead>
      <tr>
        <th>Nombre completo</th>
        <th>RUT</th>
        <th>Código curso</th>
        <th>Fecha alta</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // Mostrar cada fila de la tabla de alumnos
        while ($fila = mysqli_fetch_assoc($resultado)) {
          echo "<tr>";
          echo "<td>" . $fila['nombre_completo'] . "</td>";
          echo "<td>" . $fila['rut'] . "</td>";
          echo "<td>" . $fila['codigo_curso'] . "</td>";
          echo "<td>" . $fila['fecha_alta'] . "</td>";
          echo "<td>";
          echo "<a href='registrar_simulacion.php?id=" . $fila['id'] . "'>Registrar simulación</a>";
          echo " | ";
          echo "<a href='registrar_terreno.php?id=" . $fila['id'] . "'>Registrar terreno de grúa horquilla</a>";
          echo "</td>";
          echo "</tr>";
        }
      ?>
    </tbody>
  </table>
</body>
</html>