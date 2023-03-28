<form method="POST" action="consultas/procesar_evaluacion.php">
  <label for="titulo">Título del examen:</label>
  <input type="text" id="titulo" name="titulo" required>

  <label for="preguntas">Preguntas:</label>
  <textarea id="preguntas" name="preguntas" rows="10" required></textarea>

  <button type="submit">Registrar examen</button>
</form>
