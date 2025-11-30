<?php $page_title = "Albertson - Librería Online"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Meta-etiquetas -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Apartado de informacion del desarrollador">
    <meta name="keywords" content="Autores, Escritores, Biografías, Literatura, Libros, Obras, Autores destacados, Escritores famosos, Catálogo de autores, librerío">

    <title><?php echo isset($page_title) ? $page_title : 'Librería Online'; ?></title>

    <!-- Metadatos -->
    <meta name="author" content="Alb3rtsonTL - Albertson Terrero">
    <meta name="robots" content="index, follow">
    <meta name="og:title" content="<?php echo isset($page_title) ? $page_title : 'Librería Online'; ?>">
    <meta name="og:description" content="Apartado de informacion del desarrollador">
    <?php include_once 'layouts/header.php'; ?>

    <style>
        .card-body {
            background:
                linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #06b6d4 100%);
        }

        .card-body .card-body {
            background: rgba(255, 255, 255, 0.66);
        }
    </style>

</head>

<body>
    <?php include_once 'layouts/navbar.php'; ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <div class="card-body text-center">
                            <div class="author-avatar mb-3">
                                <img src="https://scontent.fhex6-1.fna.fbcdn.net/v/t39.30808-1/453649095_1217382876050493_4027797493146996776_n.jpg?stp=c0.420.1536.1536a_dst-jpg_s200x200_tt6&_nc_cat=105&ccb=1-7&_nc_sid=e99d92&_nc_eui2=AeGHXUih-FBv8CiKQcdR-8H7Y_CkpYUxcZBj8KSlhTFxkA03oDmvgsFy5A-4oh6Avg9IoF7yE8WUvbtEBwDOWEh7&_nc_ohc=71FflW-xRYMQ7kNvwEEpfns&_nc_oc=Adms3SKwQbI3HskZbMiSPsY17KcxRddTix-Lj92umEwq2xE6F_U-LSnXg_zCyZRVy3GOPYnUXmlfaQLLtHZnksJ9&_nc_zt=24&_nc_ht=scontent.fhex6-1.fna&_nc_gid=MClHiEApXpOgUTXINrwYmw&oh=00_AfgZ28C7Q0krfiplbShmGG_APPn6pIdZDNr89RK6cx-DBQ&oe=6930E3DF" class="rounded-circle" alt="Alb3rtsonTL" width="120" height="120">
                                <!-- <img src="https://github.com/Alb3rtsonTL.png" class="rounded-circle" alt="Alb3rtsonTL" width="120" height="120"> -->
                                <!-- <div class="avatar-placeholder">
                                    <i class="fas fa-user fa-4x text-muted"></i>
                                </div> -->
                            </div>
                            <h5 class="card-title fw-bold">
                                <i class="fas fa-terminal small me-1 opacity-75"></i> <i class="text-primary opacity-75">Alb3rtsonTL</i> <br>
                                Albertson Terrero López
                            </h5>
                            <hr>
                            <div class="author-info text-start small">
                                <p class="card-text text-muted text-center">
                                    Desarrollador y Adm. de Aplicaciones.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'layouts/footer.php'; ?>