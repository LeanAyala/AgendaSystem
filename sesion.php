<?php
// login.php

session_start(); // Inicia la sesión para gestionar la información del usuario

include("./admin/config/db.php"); // Incluye la configuración de la base de datos

// Recupera los datos enviados desde el formulario de inicio de sesión
$usuario = $_POST['user']; // Nombre de usuario
$pass = $_POST['pass']; // Contraseña

// Consulta preparada para evitar inyección SQL
$SQLS = "SELECT name_user, password FROM usuario WHERE name_user = ?";
$stmt = $conex->prepare($SQLS); // Prepara la consulta SQL
$stmt->bind_param("s", $usuario); // Vincula el parámetro del nombre de usuario

// Ejecuta la consulta
$stmt->execute();
$result = $stmt->get_result(); // Obtiene el resultado de la consulta

// Verifica si se encontró el usuario
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); // Obtiene la fila asociativa con los datos del usuario

    // Verifica si la contraseña ingresada coincide con la almacenada
    if (password_verify($pass, $row['password'])) {
        // Credenciales correctas, se establece la sesión del usuario
        $_SESSION['usuario'] = $usuario;
        header('Location: home.php'); // Redirige al usuario a la página principal
        exit(); // Detiene la ejecución del script
    } else {
        // Contraseña incorrecta
        header('Location: index.php?error=invalid_password'); // Redirige al formulario con un mensaje de error
        exit(); // Detiene la ejecución del script
    }
} else {
    // Usuario no encontrado en la base de datos
    header('Location: index.php?error=user_not_found'); // Redirige al formulario con un mensaje de error
    exit(); // Detiene la ejecución del script
}

// Cierra la declaración preparada y la conexión a la base de datos
$stmt->close();
$conex->close();
?>
