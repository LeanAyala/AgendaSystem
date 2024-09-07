<?php

// Configuración de la conexión con la base de datos
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "celke";

try {
    // Crea la instancia PDO para conectar con la base de datos
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    
    // Establece el modo de error para excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Mensaje opcional para indicar éxito (descomenta si lo necesitas)
    // echo "Conexión con la base de datos realizada con éxito.";
} catch (PDOException $err) {
    // Muestra un mensaje de error si la conexión falla
    die("Error: No se pudo realizar la conexión con la base de datos. Error generado: " . $err->getMessage());
}

// Fin de la conexión con la base de datos utilizando PDO
?>
