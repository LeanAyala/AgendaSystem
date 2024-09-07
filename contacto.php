<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="shortcut icon" href="./assets/images/icono.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <?php include("./layout/cabecera.php"); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card text-center mt-5">
                    <div class="card-header"> 
                        <h1>Contáctanos</h1>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Envíanos un mensaje si tienes problemas con el sistema</h5>
                    </div>
                    <!-- Formulario -->
                    <form action="crud/contact.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Dirección Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="Ingrese su dirección de email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Escribir mensaje</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" required></textarea>
                        </div>
                        <div class="card-footer text-muted">
                            <button type="submit" class="btn btn-primary">Enviar mensaje</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include("./layout/pie.php"); ?>
</body>
</html>