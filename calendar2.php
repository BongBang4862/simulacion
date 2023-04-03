<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Horarios Disponibles de Simuladores</title>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' rel='stylesheet' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
</head>
<body>
    <?php  
    include('templates/modal.php')
    
    ?>
    <div id='calendar'>
        
    </div>
    <script>
        $(document).ready(function() {
    $('#btnGuardarReserva').click(function() {
        var nombre = $('#inputNombre').val();
        var simulador = $('#selectSimulador').val();
        var fecha = $('#inputFecha').val();
        var horaInicio = $('#inputHoraInicio').val();
        var horaFinal = $('#inputHoraFinal').val();

        // Validación de campos vacíos
        if (nombre == '' || simulador == '' || fecha == '' || horaInicio == '' || horaFinal == '') {
            alert('Por favor, complete todos los campos.');
            return false;
        }

        // Envío de datos a través de AJAX
        $.ajax({
            url: 'guardar_reserva.php',
            type: 'POST',
            data: {
                'nombre': nombre,
                'simulador': simulador,
                'fecha': fecha,
                'hora_inicio': horaInicio,
                'hora_final': horaFinal
            },
            success: function(response) {
                if (response == 'ok') {
                    alert('La reserva se ha guardado correctamente.');
                    location.reload();
                } else {
                    alert('Ha ocurrido un error al guardar la reserva.');
                }
            }
        });
    });
});

        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultView: 'month',
                editable: false,
                eventLimit: true,
                events: 'consultas/eventos.php',
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    $('#modal').modal('show');
                    $('#start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                },
                eventRender: function(event, element) {
                    element.bind('dblclick', function() {
                        $('#modalUpdate').modal('show');
                        $('#id').val(event.id);
                        $('#title').val(event.title);
                        $('#startU').val(event.start.format('YYYY-MM-DD HH:mm:ss'));
                        $('#endU').val(event.end.format('YYYY-MM-DD HH:mm:ss'));
                    });
                }
            });
        });
    </script>
