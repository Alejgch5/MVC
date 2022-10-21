<!DOCTYPE html>
<html lang="es">

<head>
    <title><?php echo TITLE . '-' . $data['title']; ?></title>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/estilos.csss">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/app.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/owl.carousel.css">
    <!--iconos-->
    <script src="https://kit.fontawesome.com/6d0d2b42b1.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/img/logo_blanco.svg" type="image/x-icon">
    <!--iconos estrellas-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
</head>

<body>




    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link brand-text" href="<?php echo BASE_URL . 'tutor/home' ?>"><i class="fas fa-home"></i><span> Home</a></span>
                </li>
                <li class="nav-item active">
                    <a class="nav-link brand-text" href="<?php echo BASE_URL . 'tematicas' ?>"><i class="fas fa-tags"></i><span> Tematicas</a></span>
                </li>
                <li class="nav-item active">
                    <a class="nav-link brand-text" href="<?php echo BASE_URL . 'alumnos' ?>"><i class="fas fa-users"></i><span> Alumnos</a></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link brand-text" href="<?php echo BASE_URL . 'cursos' ?>"><i class="fas fa-book"></i><span> Cursos</a></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link brand-text" href="#">Valoraciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link brand-text" href="#">Promociones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link brand-text" href="#">Ganancias</a>
                </li>
            </ul>
            <span class="navbar-text">
                <a class="nav-link" href="<?php echo BASE_URL . 'home' ?>"><i class="fas fa-home"></i><span>Volver al frontal</a></span>
            </span>
        </div>
    </nav>