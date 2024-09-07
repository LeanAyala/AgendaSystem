<?php

// Incluir el archivo con la conexión a la base de datos
include_once './admin/config/db.php';

// Recibir los datos enviados por JavaScript
$datos = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Crear la consulta para registrar un evento en la base de datos
$query_cad_evento = "INSERT INTO events (title, color, start, end, address, team, referent, promoter) VALUES (:title, :color, :start, :end, :address, :team, :referent, :promoter)";

// Preparar la consulta
$cad_evento = $conn->prepare($query_cad_evento);

// Vincular los parámetros con los valores
$cad_evento->bindParam(':title', $datos['cad_title']);
$cad_evento->bindParam(':color', $datos['cad_color']);
$cad_evento->bindParam(':start', $datos['cad_start']);
$cad_evento->bindParam(':end', $datos['cad_end']);
$cad_evento->bindParam(':address', $datos['cad_address']);
$cad_evento->bindParam(':team', $datos['cad_team']);
$cad_evento->bindParam(':referent', $datos['cad_referent']);
$cad_evento->bindParam(':promoter', $datos['cad_promoter']);

// Verificar si el evento fue registrado correctamente
if ($cad_evento->execute()) {
    // Preparar la respuesta en caso de éxito
    $respuesta = [
        'status' => true,
        'msg' => '¡Evento registrado con éxito!',
        'id' => $conn->lastInsertId(),
        'title' => $datos['cad_title'],
        'color' => $datos['cad_color'],
        'start' => $datos['cad_start'],
        'end' => $datos['cad_end'],
        'address' => $datos['cad_address'],
        'team' => $datos['cad_team'],
        'referent' => $datos['cad_referent'],
        'promoter' => $datos['cad_promoter']
    ];
} else {
    // Preparar la respuesta en caso de error
    $respuesta = [
        'status' => false,
        'msg' => 'Error: ¡Evento no registrado!'
    ];
}

// Convertir el array en JSON y devolverlo a JavaScript
echo json_encode($respuesta);
?>
