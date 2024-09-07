<?php 

session_start(); // Inicia la sesión para acceder a las variables de sesión

// Verifica si el usuario está en la sesión
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario']; // Recupera el nombre de usuario de la sesión
} else {
    $usuario = "Invitado"; // Si no está logueado, se establece un valor por defecto
}
?>

<!-- Incluir el archivo de cabecera -->
<?php include("./layout/cabecera.php"); ?>

<!-- Contenido principal de la página -->
<div class="jumbotron text-center">
    <!-- Mensaje de bienvenida, incluyendo el nombre del usuario -->
    <h1 class="display-3">Bienvenido a tu Agenda <?php echo "@" . htmlspecialchars($usuario); ?></h1>
    <p class="lead">Aquí podrás organizar tus eventos <br> y actividades importantes.</p>
    <hr class="my-2">

    <!-- Imagen representativa con estilo y centrado -->
    <img src="assets/images/image.png" width="400" class="img-thumbnail rounded mx-auto d-block" alt="">
    <p>Más información</p>

    <!-- Botón para gestionar la agenda -->
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="./agenda.php" role="button">Gestionar agenda</a>
    </p>
</div>

<!-- Incluir el archivo de pie de página -->
<?php include("./layout/pie.php"); ?>
