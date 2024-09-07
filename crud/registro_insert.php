<?php

// Incluir la configuración de la base de datos
include("../admin/config/db.php");

// Verificar si se ha enviado el formulario de registro
if (isset($_POST['register'])) {
    // Obtener los valores del formulario
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $rol_id = 1;  // Establecer el rol por defecto

    // Verificar si el nombre de usuario ya existe en la base de datos
    $checkSQL = $conex->prepare("SELECT * FROM usuario WHERE name_user = ?");
    if ($checkSQL === false) {
        // Mostrar error si no se puede preparar la consulta
        die("Error en la preparación de la consulta: " . $conex->error);
    }

    // Asignar el valor del nombre de usuario al parámetro de la consulta
    $checkSQL->bind_param("s", $user);
    $checkSQL->execute();  // Ejecutar la consulta
    $result = $checkSQL->get_result();  // Obtener el resultado de la consulta

    // Si el nombre de usuario ya existe, salir del script
    if ($result->num_rows > 0) {
        exit();  // Salir del script sin hacer nada
    }

    $checkSQL->close();  // Cerrar la consulta

    // Encriptar la contraseña antes de almacenarla en la base de datos
    $hashed_password = password_hash($pass, PASSWORD_BCRYPT);

    // Preparar la consulta SQL para insertar un nuevo usuario
    $SQL = $conex->prepare("INSERT INTO usuario (name_user, email, password, rol_id) VALUES (?, ?, ?, ?)");
    if ($SQL === false) {
        // Mostrar error si no se puede preparar la consulta
        die("Error en la preparación de la consulta: " . $conex->error);
    }

    // Vincular los parámetros (valores de usuario, correo electrónico, contraseña encriptada, y rol) a la consulta
    $SQL->bind_param("sssi", $user, $email, $hashed_password, $rol_id);

    // Ejecutar la consulta y redirigir al usuario según el resultado
    if ($SQL->execute()) {
        header('Location: ../index.php');  // Redirigir a la página de inicio si se registra con éxito
        exit();
    } else {
        header('Location: registro_insert.php');  // Redirigir a la página de registro si hay un error
        exit();
    }

    // Cerrar la declaración SQL y la conexión con la base de datos
    $SQL->close();
    $conex->close();
} else {
    // Redirigir a la página de registro si el formulario no se ha enviado
    header('Location: registro_insert.php');
    exit();
}
?>
