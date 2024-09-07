<?php

// Incluir el archivo con la conexión a la base de datos
include_once './conexion.php';

// Consulta para recuperar los eventos, incluyendo los nuevos campos
$query_events = "SELECT id, title, color, start, end, address, team, referent, promoter FROM events";

// Preparar la consulta
$result_events = $conn->prepare($query_events);

// Ejecutar la consulta
$result_events->execute();

// Crear el array que recibirá los eventos
$eventos = [];

// Recorrer la lista de registros retornados desde la base de datos
while ($row_events = $result_events->fetch(PDO::FETCH_ASSOC)) {
    $eventos[] = [
        'id' => $row_events['id'],
        'title' => $row_events['title'],
        'color' => $row_events['color'],
        'start' => $row_events['start'],
        'end' => $row_events['end'],
        'direccion' => $row_events['direccion'],
        'equipo' => $row_events['equipo'],
        'referente' => $row_events['referente'],
        'promotor' => $row_events['promotor']
    ];
}

// Convertir el array en JSON y devolverlo a JavaScript
echo json_encode($eventos);
?>
