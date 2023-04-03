<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Aquí añade los campos que necesites para generar una reserva, por ejemplo: -->
            <div class="form-group">
                <label for="inputNombre">Nombre completo</label>
                <input type="text" class="form-control" id="inputNombre" placeholder="Ingresa tu nombre completo">
            </div>
            <div class="form-group">
                <label for="selectSimulador">Simulador</label>
                <select class="form-control" id="selectSimulador">
                    <option value="1">Simulador 1</option>
                    <option value="2">Simulador 2</option>
                    <option value="3">Simulador 3</option>
                    <!-- Aquí añade todas las opciones de simuladores disponibles -->
                </select>
            </div>
            <div class="form-group">
                <label for="inputFecha">Fecha</label>
                <input type="date" class="form-control" id="inputFecha">
            </div>
            <div class="form-group">
                <label for="inputHoraInicio">Hora de inicio</label>
                <input type="time" class="form-control" id="inputHoraInicio">
            </div>
            <div class="form-group">
                <label for="inputHoraFinal">Hora de finalización</label>
                <input type="time" class="form-control" id="inputHoraFinal">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="btnGuardarReserva">Guardar</button>
          </div>
        </div>
    </div>
</div>