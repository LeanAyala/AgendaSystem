<?php

include('../admin/config/db.php'); // Verifica que esta ruta sea correcta
session_start();

if (isset($_SESSION['usuario'])) {
    session_destroy();
    header('Location: ./index.php'); // Asegúrate de que la ruta sea correcta
    exit(); // Asegúrate de que el script se detiene después de la redirección
}
