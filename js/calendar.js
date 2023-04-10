$(document).ready(function() {
    // Carga el calendario
      $.ajax({
        url: 'consultas/obtener_simuladores.php',
        dataType: 'json',
        success: function(simuladores) {
          // Procesar los datos recibidos
           var select = $('#selectSimulador');
            for (var i = 0; i < simuladores.length; i++) {
                select.append('<option value="' + simuladores[i].id + '">' + simuladores[i].nombre_simulador + '</option>');
            }
        },
        error: function() {
          alert('Error al cargar los simuladores');
        }
      });

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
        },
        defaultView: 'agendaWeek',
        selectable: true,
        selectHelper: true,
        slotDuration: '02:00:00',
        minTime: '13:00:00',
        maxTime: '21:00:00',
        hiddenDays: [0],
        businessHours: [
          { // De lunes a viernes
            dow: [1, 2, 3, 4, 5],
            start: '13:00',
            end: '17:00'
          },
          { // Sábados
            dow: [6],
            start: '09:00',
            end: '13:00'
          }
        ],
        select: function(start, end) {
            // Muestra el modal para agregar una reserva
            $('#modalAgregarReserva').modal('show');
            
            // Asigna la fecha y hora de inicio a los campos correspondientes del formulario
            $('#inputFecha').val(moment(start).format('YYYY-MM-DD'));
            $('#inputHoraInicio').val(moment(start).format('HH:mm'));
            $('#inputHoraFinal').val(moment(end).format('HH:mm'));
        },
        editable: true,
        eventLimit: true,
        events: 'consultas/eventos.php',
        eventColor: 'color'
    });

    function cargarSimuladores() {
      // Hacer la petición AJAX
    
    };


    // Agrega la reserva cuando se hace clic en el botón "Guardar reserva" del modal
    $('#btnGuardarReserva').click(function() {
        // Obtener los valores del formulario modal
        var nombre = $('#inputNombre').val();
        var alumno_id = $('#alumno_id').val();
        var simulador = $('#selectSimulador').val();
        var fecha = $('#inputFecha').val();
        var horaInicio = $('#inputHoraInicio').val();
        var horaFinal = $('#inputHoraFinal').val();
        
        // Verificar si el simulador está disponible en la fecha y hora seleccionadas
        $.ajax({
            url: 'consultas/verificar_disponibilidad.php',
            type: 'POST',
            data: {
                simulador: simulador,
                fecha: fecha,
                horaInicio: horaInicio,
                horaFinal: horaFinal
            },
            success: function(response) {
                var parsedResponse = JSON.parse(response);
                console.log(parsedResponse.disponible);
                if (parsedResponse.disponible) {
                    // Si el simulador está disponible, agregar la reserva a la base de datos
                    $.ajax({
                        url: 'consultas/guardar_reserva.php',
                        type: 'POST',
                        data: {
                            nombre: nombre,
                            alumno_id: alumno_id,
                            simulador: simulador,
                            fecha: fecha,
                            horaInicio: horaInicio,
                            horaFinal: horaFinal
                        },
                        success: function(response) {
                            console.log(response);

                            if (parsedResponse) {
                                // Si se agrega la reserva correctamente, actualizar el calendario
                                $('#calendar').fullCalendar('refetchEvents');
                                // Cerrar el formulario modal
                                $('#modalReserva').modal('hide');
                            } else {
                                alert('Error al agregar reserva');
                            }
                        }
                    });
                } else {
                    alert('El simulador no está disponible en la fecha y hora seleccionadas');
                }
            }
        });
    });
})