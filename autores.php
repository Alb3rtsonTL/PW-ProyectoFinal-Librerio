<?php
$page_title = "Autores - Librería Online";
include_once 'config/database.php';

$database = new Database();
$db = $database->getConnection();

$query = "SELECT a.*, b.biografia, f.fotografia
          FROM autores a
          LEFT JOIN biografias b ON a.id_autor = b.id_autor
          LEFT JOIN fotografias f ON a.id_autor = f.id_autor
          ORDER BY a.apellido, a.nombre ASC";

$stmt = $db->prepare($query);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Meta-etiquetas -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Apartado para ver las informaciones de los autores">
    <meta name="keywords" content="Autores, Escritores, Biografías, Literatura, Libros, Obras, Autores destacados, Escritores famosos, Catálogo de autores, Librerio">

    <title><?php echo isset($page_title) ? $page_title : 'Librería Online'; ?></title>

    <!-- Metadatos opcionales -->
    <meta name="author" content="Alb3rtsonTL - Albertson Terrero">
    <meta name="robots" content="index, follow">
    <meta name="og:title" content="<?php echo isset($page_title) ? $page_title : 'Librería Online'; ?>">
    <meta name="og:description" content="Apartado para ver las informaciones de los autores">
    <?php
    $page_title = "Inicio - Librería Online";
    include_once 'layouts/header.php';
    ?>

</head>

<body>
    <?php include_once 'layouts/navbar.php'; ?>
    <div class="container my-5">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="display-5 fw-bold mb-3">
                    <i class="fas fa-users text-primary me-2"></i>Nuestros Autores
                </h2>
                <p class="lead text-muted">Conoce a los escritores que hacen posible nuestra colección.</p>
            </div>
        </div>

        <!-- Barra de búsqueda -->
        <div class="row mb-4">
            <div class="col-md-8 mx-auto">
                <div class="input-group input-group-lg">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" id="searchAutor" placeholder="Buscar autor por nombre o ciudad...">
                </div>
            </div>
        </div>

        <div class="row g-4" id="autoresContainer">
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <div class="col-md-6 col-lg-4 autor-card">
                    <div class="card h-100 shadow-sm border-0 hover-card">
                        <div class="card-body text-center">
                            <div class="author-avatar mb-3">
                                <?php if (!empty($row['fotografia'])): ?>
                                    <img src="assets/images/<?php echo htmlspecialchars($row['fotografia']); ?>"
                                        class="rounded-circle" alt="Foto autor" width="120" height="120">
                                <?php else: ?>
                                    <div class="avatar-placeholder">
                                        <i class="fas fa-user fa-4x text-muted"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <h5 class="card-title fw-bold">
                                <?php echo htmlspecialchars($row['nombre'] . ' ' . $row['apellido']); ?>
                            </h5>
                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt me-1"></i>
                                <?php echo htmlspecialchars($row['ciudad'] . ', ' . $row['estado']); ?>
                            </p>

                            <?php if (!empty($row['biografia'])): ?>
                                <p class="card-text small text-muted">
                                    <?php echo htmlspecialchars(substr($row['biografia'], 0, 150)) . '...'; ?>
                                </p>
                            <?php endif; ?>

                            <hr>
                            <div class="author-info text-start small">
                                <p class="mb-1">
                                    <i class="fas fa-phone text-primary me-2"></i>
                                    <?php echo htmlspecialchars($row['telefono']); ?>
                                </p>
                                <p class="mb-1">
                                    <i class="fas fa-home text-success me-2"></i>
                                    <?php echo htmlspecialchars($row['direccion']); ?>
                                </p>
                                <p class="mb-0">
                                    <i class="fas fa-globe text-info me-2"></i>
                                    <?php echo htmlspecialchars($row['pais']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <?php include_once 'layouts/footer.php'; ?>