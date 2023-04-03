<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Reservas de Simuladores</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/es.min.js"></script>
</head>
<body>
    <div id="calendar"></div>

    <script>
        $(document).ready(function() {
            // Obtener eventos desde el servidor
            $.ajax({
                url: "consultas/eventos.php",
                type: "GET",
                success: function(response) {
                    var eventos = [];
                    response.forEach(function(evento) {
                        eventos.push({
                            title: evento.nombre_simulador,
                            start: evento.fecha + 'T' + evento.hora_inicio,
                            end: evento.fecha + 'T' + evento.hora_final,
                            color: evento.color
                        });
                    });

                    // Inicializar el calendario
                    $('#calendar').fullCalendar({
                        locale: 'es',
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                        },
                        navLinks: true,
                        editable: false,
                        eventLimit: true,
                        events: eventos
                    });
                }
            });
        });
    </script>
</body>
</html>
