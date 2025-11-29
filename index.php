<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Meta-etiquetas -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tu biblioteca digital para explorar libros, autores y géneros. Descubre, busca y organiza tu lectura con la plataforma moderna de Librerio.">
    <meta name="keywords" content="Autores, Escritores, Biografías, Literatura, Libros, Obras, Autores destacados, Escritores famosos, Catálogo de autores, Librerio">

    <title><?php echo isset($page_title) ? $page_title : 'Librería Online'; ?></title>

    <!-- Metadatos -->
    <meta name="author" content="Alb3rtsonTL - Albertson Terrero">
    <meta name="robots" content="index, follow">
    <meta name="og:title" content="<?php echo isset($page_title) ? $page_title : 'Librería Online'; ?>">
    <meta name="og:description" content="Librerio es una plataforma digital diseñada para descubrir libros, explorar autores, gestionar colecciones y acceder a contenido literario de forma ágil y moderna.">
    <?php
    $page_title = "Inicio - Librería Online";
    include_once 'layouts/header.php';
    ?>

</head>

<body>
    <?php include_once 'layouts/navbar.php'; ?>

    <div class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-50">
                <div class="col-lg-6">
                    <h1 class="display-3 fw-bold mb-4">Librerío tu Librería Online</h1>
                    <p class="lead mb-4">Descubre una amplia colección de libros y conoce a los autores más destacados.</p>
                    <div class="d-flex gap-3">
                        <a href="libros.php" class="btn btn-primary btn-lg">
                            <i class="fas fa-book me-2"></i>Ver Libros
                        </a>
                        <a href="autores.php" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-users me-2"></i>Ver Autores
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center hero-icon">
                    <i class="fas fa-book-reader fa-10x text-primary opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0 hover-card">
                    <div class="card-body text-center p-4">
                        <div class="icon-box mb-3">
                            <i class="fas fa-book fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title fw-bold">Amplio Catálogo</h5>
                        <p class="card-text text-muted">Miles de títulos disponibles en diferentes géneros.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0 hover-card">
                    <div class="card-body text-center p-4">
                        <div class="icon-box mb-3">
                            <i class="fas fa-users fa-3x text-success"></i>
                        </div>
                        <h5 class="card-title fw-bold">Autores Destacados</h5>
                        <p class="card-text text-muted">Conoce la biografía de tus autores favoritos.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0 hover-card">
                    <div class="card-body text-center p-4">
                        <div class="icon-box mb-3">
                            <i class="fas fa-envelope fa-3x text-info"></i>
                        </div>
                        <h5 class="card-title fw-bold">Contáctanos</h5>
                        <p class="card-text text-muted">Estamos para ayudarte en lo que necesites.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'layouts/footer.php'; ?>