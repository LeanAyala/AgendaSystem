<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Configuración básica de la página -->
    <meta charset="UTF-8"> <!-- Codificación de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Para diseño responsive -->
    <title>Login</title> <!-- Título de la página -->

    <!-- Icono de la página -->
    <link rel="shortcut icon" href="./assets/images/icono.png" type="image/x-icon">
    
    <!-- Archivos de estilos -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css"> <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Archivo CSS personalizado -->
</head>
<body>
    <!-- Contenedor principal para el formulario de registro -->
    <div class="card mx-auto mt-5" style="width: 20rem;">
        <!-- Encabezado de la tarjeta -->
        <div class="card-header">
            <h2 class="text-center">Sign Up</h2> <!-- Título centrado -->
        </div>

        <!-- Cuerpo de la tarjeta -->
        <div class="card-body p-3">
            <!-- Formulario de registro -->
            <form action="./crud/registro_insert.php" method="post"> <!-- Acción del formulario (archivo PHP que procesará el registro) -->
                
                <!-- Campo de entrada para el usuario -->
                <div>
                    <label for="user" class="form-label">Usuario</label> <!-- Etiqueta del campo -->
                    <input type="text" placeholder="Usuario" class="form-control" name="user"> <!-- Entrada de texto para el usuario -->
                </div>

                <!-- Campo de entrada para el email -->
                <div>
                    <label for="pass" class="form-label">Email</label> <!-- Etiqueta del campo -->
                    <input type="email" placeholder="Email" class="form-control" name="email"> <!-- Entrada de texto para el email -->
                </div>
                
                <!-- Campo de entrada para la contraseña -->
                <div>
                    <label for="pass" class="form-label">Contraseña</label> <!-- Etiqueta del campo -->
                    <input type="password" placeholder="Contraseña" class="form-control" name="pass"> <!-- Entrada de texto para la contraseña -->
                </div>

                <!-- Pie de la tarjeta con el botón de envío -->
                <div class="card-footer mt-2">
                    <button type="submit" class="btn btn-outline-success boton" name="register">Sign Up</button> <!-- Botón de envío del formulario -->
                </div>

                <!-- Enlace para redirigir al usuario a la página de inicio de sesión -->
                <div class="mt-2">
                    <p class="text-center">¿Ya tienes una cuenta? <a href="./index.php">ingresa aquí</a></p> <!-- Enlace a la página de inicio de sesión -->
                </div>
            </form>
        </div>
    </div>
</body>
</html>
