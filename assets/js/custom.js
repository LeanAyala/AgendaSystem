// Ejecutar cuando el documento HTML esté completamente cargado
document.addEventListener('DOMContentLoaded', function () {

    // Obtener el SELECTOR del calendario por el atributo id
    var calendarEl = document.getElementById('calendar');

    // Obtener el SELECTOR de la ventana modal para registrar
    const registrarModal = new bootstrap.Modal(document.getElementById("cadastrarModal"));

    // Instanciar FullCalendar.Calendar y asignar a la variable calendar
    var calendar = new FullCalendar.Calendar(calendarEl, {

        // Incluir el bootstrap 5
        themeSystem: 'bootstrap5',

        // Crear el encabezado del calendario
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

        // Definir el idioma usado en el calendario
        locale: 'es',

        // Definir la fecha inicial
        //initialDate: '2023-01-12',
        //initialDate: '2023-10-12',

        // Permitir hacer clic en los nombres de los días de la semana 
        navLinks: true,

        // Permitir hacer clic y arrastrar el ratón sobre uno o varios días en el calendario
        selectable: true,

        // Indicar visualmente el área que será seleccionada antes de que el usuario suelte el botón del ratón para confirmar la selección
        selectMirror: true,

        // Permitir arrastrar y redimensionar los eventos directamente en el calendario.
        editable: true,

        // Número máximo de eventos en un día determinado, si es true, el número de eventos estará limitado a la altura de la celda del día
        dayMaxEvents: true,

        // Llamar al archivo PHP para recuperar los eventos
        events: 'listar_evento.php',

        // Identificar el clic del usuario sobre el evento
        eventClick: function (info) {

            // Obtener el SELECTOR de la ventana modal para visualizar
            const visualizarModal = new bootstrap.Modal(document.getElementById("visualizarModal"));

            // Enviar a la ventana modal los datos del evento
            document.getElementById("visualizar_id").innerText = info.event.id;
            document.getElementById("visualizar_title").innerText = info.event.title;
            document.getElementById("visualizar_start").innerText = info.event.start.toLocaleString();
            document.getElementById("visualizar_end").innerText = info.event.end !== null ? info.event.end.toLocaleString() : info.event.start.toLocaleString();

            // Abrir la ventana modal para visualizar
            visualizarModal.show();
        },
        // Abrir la ventana modal para registrar cuando se haga clic en un día en el calendario
        select: function (info) {

            // Llamar a la función para convertir la fecha seleccionada a ISO8601 y enviar al formulario
            document.getElementById("cad_start").value = convertirFecha(info.start);
            document.getElementById("cad_end").value = convertirFecha(info.start);

            // Abrir la ventana modal para registrar
            registrarModal.show();
        }
    });

    // Renderizar el calendario
    calendar.render();

    // Convertir la fecha
    function convertirFecha(fecha) {

        // Convertir la cadena en un objeto Date
        const fechaObj = new Date(fecha);

        // Extraer el año de la fecha
        const año = fechaObj.getFullYear();

        // Obtener el mes, el mes comienza desde 0, padStart añade ceros a la izquierda para asegurar que el mes tenga dos dígitos
        const mes = String(fechaObj.getMonth() + 1).padStart(2, '0');

        // Obtener el día del mes, padStart añade ceros a la izquierda para asegurar que el día tenga dos dígitos
        const dia = String(fechaObj.getDate()).padStart(2, '0');

        // Obtener la hora, padStart añade ceros a la izquierda para asegurar que la hora tenga dos dígitos
        const hora = String(fechaObj.getHours()).padStart(2, '0');

        // Obtener el minuto, padStart añade ceros a la izquierda para asegurar que el minuto tenga dos dígitos
        const minuto = String(fechaObj.getMinutes()).padStart(2, '0');

        // Retornar la fecha
        return `${año}-${mes}-${dia} ${hora}:${minuto}`;
    }

    // Obtener el SELECTOR del formulario para registrar eventos
    const formRegistrarEvento = document.getElementById("formCadEvento");

    // Obtener el SELECTOR del mensaje genérico
    const mensaje = document.getElementById("msg");

    // Obtener el SELECTOR del mensaje para registrar eventos
    const mensajeRegistrarEvento = document.getElementById("msgCadEvento");

    // Obtener el SELECTOR del botón de la ventana modal para registrar eventos
    const btnRegistrarEvento = document.getElementById("btnCadEvento");

    // Solo accede al IF cuando exista el SELECTOR "formCadEvento"
    if (formRegistrarEvento) {

        // Esperar a que el usuario haga clic en el botón de registrar
        formRegistrarEvento.addEventListener("submit", async (e) => {

            // No permitir la actualización de la página
            e.preventDefault();

            // Mostrar el texto "guardando" en el botón
            btnRegistrarEvento.value = "Guardando...";

            // Obtener los datos del formulario
            const datosFormulario = new FormData(formRegistrarEvento);

            // Llamar al archivo PHP responsable de guardar el evento
            const respuesta = await fetch("registro_evento.php", {
                method: "POST",
                body: datosFormulario
            });

            // Leer los datos devueltos por el PHP
            const datosRespuesta = await respuesta.json();

            // Acceder al IF cuando no se registre con éxito
            if (!datosRespuesta['status']) {

                // Enviar el mensaje al HTML
                mensajeRegistrarEvento.innerHTML = `<div class="alert alert-danger" role="alert">${datosRespuesta['msg']}</div>`;

            } else {

                // Enviar el mensaje al HTML
                mensaje.innerHTML = `<div class="alert alert-success" role="alert">${datosRespuesta['msg']}</div>`;

                // Limpiar el mensaje para registrar eventos
                mensajeRegistrarEvento.innerHTML = "";

                // Limpiar el formulario
                formRegistrarEvento.reset();

                // Crear el objeto con los datos del evento
                const nuevoEvento = {
                    id: datosRespuesta['id'],
                    title: datosRespuesta['title'],
                    color: datosRespuesta['color'],
                    start: datosRespuesta['start'],
                    end: datosRespuesta['end'],
                    address: datosRespuesta['address'],
                    team: datosRespuesta['team'],
                    referent: datosRespuesta['referent'],
                    promoter: datosRespuesta['promoter']
                }

                // Añadir el evento al calendario
                calendar.addEvent(nuevoEvento);

                // Llamar a la función para remover el mensaje después de 3 segundos
                removerMensaje();

                // Cerrar la ventana modal para registrar
                registrarModal.hide();
            }

            // Mostrar el texto "Registrar" en el botón
            btnRegistrarEvento.value = "Registrar";

        });
    }

    // Función para remover el mensaje después de 3 segundos
    function removerMensaje() {
        setTimeout(() => {
            document.getElementById('msg').innerHTML = "";
        }, 3000)
    }
});
