<?php
$page_title = "Libros - Librería Online";
include_once 'config/database.php';

$database = new Database();
$db = $database->getConnection();

$query = "SELECT t.id_titulo, t.titulo, t.tipo, t.precio, t.total_ventas, 
          t.fecha_pub, p.nombre_pub
          FROM titulos t
          LEFT JOIN publicadores p ON t.id_pub = p.id_pub
          ORDER BY t.titulo ASC";

$stmt = $db->prepare($query);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Meta-etiquetas -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Apartado para ver las informaciones de los libros">
    <meta name="keywords" content="Autores, Escritores, Biografías, Literatura, Libros, Obras, Autores destacados, Escritores famosos, Catálogo de autores, Librerio">

    <title><?php echo isset($page_title) ? $page_title : 'Librería Online'; ?></title>

    <!-- Metadatos opcionales -->
    <meta name="author" content="Alb3rtsonTL - Albertson Terrero">
    <meta name="robots" content="index, follow">
    <meta name="og:title" content="<?php echo isset($page_title) ? $page_title : 'Librería Online'; ?>">
    <meta name="og:description" content="Apartado para ver las informaciones de los libros">
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
                    <i class="fas fa-book text-primary me-2"></i>Catálogo de Libros
                </h2>
                <p class="lead text-muted">Explora nuestra colección completa de títulos disponibles.</p>
            </div>
        </div>

        <!-- Barra de búsqueda -->
        <div class="row mb-4">
            <div class="col-md-8 mx-auto">
                <div class="input-group input-group-lg">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" id="searchInput" placeholder="Buscar por título, tipo o publicador...">
                </div>
            </div>
        </div>

        <div class="row g-4" id="librosContainer">
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <div class="col-md-6 col-lg-4 libro-card">
                    <div class="card h-100 shadow-sm border-0 hover-card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0 text-truncate"><?php echo htmlspecialchars($row['titulo']); ?></h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <strong><i class="fas fa-tag me-2 text-primary"></i>Tipo:</strong>
                                <span class="badge bg-secondary"><?php echo htmlspecialchars($row['tipo']); ?></span>
                            </p>
                            <p class="card-text">
                                <strong><i class="fas fa-building me-2 text-success"></i>Editorial:</strong>
                                <?php echo htmlspecialchars($row['nombre_pub']); ?>
                            </p>
                            <p class="card-text">
                                <strong><i class="fas fa-dollar-sign me-2 text-warning"></i>Precio:</strong>
                                <span class="text-success fw-bold">
                                    $<?php echo number_format($row['precio'], 2); ?>
                                </span>
                            </p>
                            <p class="card-text">
                                <strong><i class="fas fa-chart-line me-2 text-info"></i>Ventas:</strong>
                                <?php echo number_format($row['total_ventas']); ?> unidades
                            </p>
                            <p class="card-text">
                                <strong><i class="fas fa-calendar me-2 text-danger"></i>Publicación:</strong>
                                <?php echo date('d/m/Y', strtotime($row['fecha_pub'])); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <?php include_once 'layouts/footer.php'; ?>