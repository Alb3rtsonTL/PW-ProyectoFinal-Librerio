<?php
$page_title = "Contacto - Librería Online";
include_once 'config/database.php';

$mensaje = '';
$tipo_mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    $nombre = htmlspecialchars(strip_tags($_POST['nombre']));
    $correo = htmlspecialchars(strip_tags($_POST['correo']));
    $asunto = htmlspecialchars(strip_tags($_POST['asunto']));
    $comentario = htmlspecialchars(strip_tags($_POST['comentario']));

    if (!empty($nombre) && !empty($correo) && !empty($asunto) && !empty($comentario)) {
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            try {
                $query = "INSERT INTO contacto (fecha, correo, nombre, asunto, comentario) 
                         VALUES (NOW(), :correo, :nombre, :asunto, :comentario)";

                $stmt = $db->prepare($query);
                $stmt->bindParam(':correo', $correo);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':asunto', $asunto);
                $stmt->bindParam(':comentario', $comentario);

                if ($stmt->execute()) {
                    $mensaje = '¡Mensaje enviado exitosamente! Te contactaremos pronto.';
                    $tipo_mensaje = 'success';
                } else {
                    $mensaje = 'Error al enviar el mensaje. Intenta nuevamente.';
                    $tipo_mensaje = 'danger';
                }
            } catch (PDOException $e) {
                $mensaje = 'Error en la base de datos: ' . $e->getMessage();
                $tipo_mensaje = 'danger';
            }
        } else {
            $mensaje = 'Por favor, ingresa un correo electrónico válido.';
            $tipo_mensaje = 'warning';
        }
    } else {
        $mensaje = 'Por favor, completa todos los campos.';
        $tipo_mensaje = 'warning';
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Meta-etiquetas -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Apartado de contacto">
    <meta name="keywords" content="Autores, Escritores, Biografías, Literatura, Libros, Obras, Autores destacados, Escritores famosos, Catálogo de autores, Librerio">

    <title><?php echo isset($page_title) ? $page_title : 'Librería Online'; ?></title>

    <!-- Metadatos -->
    <meta name="author" content="Alb3rtsonTL - Albertson Terrero">
    <meta name="robots" content="index, follow">
    <meta name="og:title" content="<?php echo isset($page_title) ? $page_title : 'Librería Online'; ?>">
    <meta name="og:description" content="Apartado de contacto">
    <?php
    $page_title = "Inicio - Librería Online";
    include_once 'layouts/header.php';
    ?>

</head>

<body>
    <?php include_once 'layouts/navbar.php'; ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="text-center mb-5">
                    <h2 class="display-5 fw-bold mb-3">
                        <i class="fas fa-envelope text-primary me-2"></i>Contáctanos
                    </h2>
                    <p class="lead text-muted">¿Tienes alguna pregunta? Estamos aquí para ayudarte.</p>
                </div>

                <?php if (!empty($mensaje)): ?>
                    <div class="alert alert-<?php echo $tipo_mensaje; ?> alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i><?php echo $mensaje; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <form id="contactForm" method="POST" action="contacto.php" novalidate>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nombre" class="form-label fw-bold">
                                        <i class="fas fa-user me-2 text-primary"></i>Nombre Completo
                                    </label>
                                    <input type="text" class="form-control form-control-lg" id="nombre"
                                        name="nombre" required>
                                    <div class="invalid-feedback">Por favor ingresa tu nombre.</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="correo" class="form-label fw-bold">
                                        <i class="fas fa-envelope me-2 text-success"></i>Correo Electrónico
                                    </label>
                                    <input type="email" class="form-control form-control-lg" id="correo"
                                        name="correo" required>
                                    <div class="invalid-feedback">Por favor ingresa un correo válido.</div>
                                </div>

                                <div class="col-12">
                                    <label for="asunto" class="form-label fw-bold">
                                        <i class="fas fa-tag me-2 text-info"></i>Asunto
                                    </label>
                                    <input type="text" class="form-control form-control-lg" id="asunto"
                                        name="asunto" required>
                                    <div class="invalid-feedback">Por favor ingresa el asunto.</div>
                                </div>

                                <div class="col-12">
                                    <label for="comentario" class="form-label fw-bold">
                                        <i class="fas fa-comment me-2 text-warning"></i>Mensaje
                                    </label>
                                    <textarea class="form-control" id="comentario" name="comentario"
                                        rows="6" required></textarea>
                                    <div class="invalid-feedback">Por favor ingresa tu mensaje.</div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">
                                        <i class="fas fa-paper-plane me-2"></i>Enviar Mensaje
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row g-4 mt-4">
                    <div class="col-md-4">
                        <div class="text-center p-4 bg-light rounded">
                            <i class="fas fa-map-marker-alt fa-2x text-primary mb-3"></i>
                            <h5 class="fw-bold">Dirección</h5>
                            <p class="text-muted mb-0">Calle Principal 123<br>Santo Domingo, RD</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center p-4 bg-light rounded">
                            <i class="fas fa-phone fa-2x text-success mb-3"></i>
                            <h5 class="fw-bold">Teléfono</h5>
                            <p class="text-muted mb-0">+1 809-###-####<br>Lun - Vie: 9am - 6pm</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center p-4 bg-light rounded">
                            <i class="fas fa-envelope fa-2x text-info mb-3"></i>
                            <h5 class="fw-bold">Email</h5>
                            <p class="text-muted mb-0">info@librerio.###<br>soporte@librerio.###</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'layouts/footer.php'; ?>