<div class="modal fade" id="modalAgregarReserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <input type="text" class="form-control" value="<?php echo $_GET['name']; ?>" id="inputNombre" placeholder="Ingresa tu nombre completo">
                <input type="hidden" id="alumno_id" name="alumno_id" value="<?php echo $_GET['alumno_id']; ?>">
            </div>
            <div class="form-group">
                <label for="selectSimulador">Simulador</label>
                <select  class="form-control" id="selectSimulador">
                    
                    <!-- Aquí añade todas las opciones de simuladores disponibles -->
                </select>
            </div>
            <div class="form-group">
                <label for="inputFecha">Fecha</label>
                <input type="date" class="form-control" id="inputFecha">
            </div>
            <div class="form-group">
                <label for="inputHoraInicio">Hora de inicio</label>
                <select class="form-control" id="inputHoraInicio">
                    <option value="13:00">13:00</option>
                    <option value="15:00">15:00</option>
                    <option value="17:00">17:00</option>
                    <option value="19:00">19:00</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputHoraFinal">Hora de finalización</label>
                 <select class="form-control" id="inputHoraFinal">
                    <option value="15:00">15:00</option>
                    <option value="17:00">17:00</option>
                    <option value="19:00">19:00</option>
                    <option value="21:00">21:00</option>
                </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="btnGuardarReserva">Guardar</button>
          </div>
        </div>
    </div>
</div>