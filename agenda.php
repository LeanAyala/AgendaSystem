<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Icono de la página -->
    <link rel="shortcut icon" href="./assets/images/icono.png" type="image/x-icon">
    
    <!-- Estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Iconos de Bootstrap -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

    <!-- Estilos personalizados -->
    <link href="css/custom.css" rel="stylesheet">
    <title>Agenda</title>
</head>
<body>
    <!-- Incluir cabecera desde archivo PHP -->
    <?php include("./layout/cabecera.php"); ?>
    
    <!-- Título de la agenda -->
    <h2 class="mb-4">Agenda</h2>

    <!-- Mensaje dinámico que puede mostrar información al usuario -->
    <span id="msg"></span>

    <!-- Calendario donde se muestran los eventos -->
    <div id='calendar'></div>

    <!-- Modal para visualizar los eventos -->
    <div class="modal fade" id="visualizarModal" tabindex="-1" aria-labelledby="visualizarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Encabezado del modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="visualizarModalLabel">Visualizar Evento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <!-- Cuerpo del modal con los detalles del evento -->
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-3">ID: </dt>
                        <dd class="col-sm-9" id="visualizar_id"></dd>

                        <dt class="col-sm-3">Título: </dt>
                        <dd class="col-sm-9" id="visualizar_title"></dd>

                        <dt class="col-sm-3">Inicio: </dt>
                        <dd class="col-sm-9" id="visualizar_start"></dd>

                        <dt class="col-sm-3">Fin: </dt>
                        <dd class="col-sm-9" id="visualizar_end"></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para registrar nuevos eventos -->
    <div class="modal fade" id="cadastrarModal" tabindex="-1" aria-labelledby="cadastrarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Encabezado del modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cadastrarModalLabel">Registrar Evento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <!-- Cuerpo del modal con el formulario para registrar eventos -->
                <div class="modal-body">
                    <!-- Mensaje dinámico para notificaciones al usuario -->
                    <span id="msgCadEvento"></span>

                    <!-- Formulario de registro de eventos -->
                    <form method="POST" id="formCadEvento">
                        <!-- Campo para el título del evento -->
                        <div class="row mb-3">
                            <label for="cad_title" class="col-sm-2 col-form-label">Título</label>
                            <div class="col-sm-10">
                                <input type="text" name="cad_title" class="form-control" id="cad_title" placeholder="Título del evento">
                            </div>
                        </div>

                        <!-- Campo para la fecha y hora de inicio del evento -->
                        <div class="row mb-3">
                            <label for="cad_start" class="col-sm-2 col-form-label">Inicio</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" name="cad_start" class="form-control" id="cad_start">
                            </div>
                        </div>

                        <!-- Campo para la fecha y hora de fin del evento -->
                        <div class="row mb-3">
                            <label for="cad_end" class="col-sm-2 col-form-label">Fin</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" name="cad_end" class="form-control" id="cad_end">
                            </div>
                        </div>

                        <!-- Selección del color del evento -->
                        <div class="row mb-3">
                            <label for="cad_color" class="col-sm-2 col-form-label">Color</label>
                            <div class="col-sm-10">
                                <select name="cad_color" class="form-control" id="cad_color">
                                    <option value="">Seleccione</option>
                                    <option style="color:#FFD700;" value="#FFD700">Amarillo</option>
                                    <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                    <option style="color:#FF4500;" value="#FF4500">Naranja</option>
                                    <option style="color:#8B4513;" value="#8B4513">Marrón</option>
                                    <option style="color:#1C1C1C;" value="#1C1C1C">Negro</option>
                                    <option style="color:#436EEE;" value="#436EEE">Azul Real</option>
                                    <option style="color:#A020F0;" value="#A020F0">Púrpura</option>
                                    <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                    <option style="color:#228B22;" value="#228B22">Verde</option>
                                    <option style="color:#8B0000;" value="#8B0000">Rojo</option>
                                </select>
                            </div>
                        </div>

                        <!-- Nuevos campos para agregar más detalles del evento -->
                        <!-- Campo para la dirección del evento -->
                        <div class="row mb-3">
                            <label for="cad_address" class="col-sm-2 col-form-label">Dirección</label>
                            <div class="col-sm-10">
                                <input type="text" name="cad_address" class="form-control" id="cad_address" placeholder="Dirección del evento">
                            </div>
                        </div>

                        <!-- Campo para el equipo involucrado -->
                        <div class="row mb-3">
                            <label for="cad_team" class="col-sm-2 col-form-label">Equipo</label>
                            <div class="col-sm-10">
                                <input type="text" name="cad_team" class="form-control" id="cad_team" placeholder="Equipo involucrado">
                            </div>
                        </div>

                        <!-- Campo para el referente del evento -->
                        <div class="row mb-3">
                            <label for="cad_referent" class="col-sm-2 col-form-label">Referente</label>
                            <div class="col-sm-10">
                                <input type="text" name="cad_referent" class="form-control" id="cad_referent" placeholder="Nombre del referente">
                            </div>
                        </div>

                        <!-- Campo para el promotor del evento -->
                        <div class="row mb-3">
                            <label for="cad_promoter" class="col-sm-2 col-form-label">Promotor</label>
                            <div class="col-sm-10">
                                <input type="text" name="cad_promoter" class="form-control" id="cad_promoter" placeholder="Nombre del promotor">
                            </div>
                        </div>

                        <!-- Botón para registrar el evento -->
                        <button type="submit" name="btnCadEvento" class="btn btn-success" id="btnCadEvento">Registrar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluir pie de página desde archivo PHP -->
    <?php include("./layout/pie.php"); ?>

    <!-- Scripts de Bootstrap y otros personalizados -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- Scripts personalizados para manejar el calendario y eventos -->
    <script src="./assets/js/index.global.min.js"></script>
    <script src="./assets/js/bootstrap5/index.global.min.js"></script>
    <script src='./assets/js/core/locales/es-us.global.js'></script>
    <script src='./assets/js/custom.js'></script>
</
