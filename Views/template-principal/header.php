<!DOCTYPE html>
<html lang="es">

<head>
    <title><?php echo TITLE . '-' . $data['title']; ?></title>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/estilos.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/app.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/owl.carousel.css">

    <!--iconos-->
    <script src="https://kit.fontawesome.com/6d0d2b42b1.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/img/logo_blanco.svg" type="image/x-icon">

    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo MONEDA; ?>"></script>
</head>

<body>
    <!--inicio del header-->
    <header>
        <nav class="navbar navbar-expand-lg container-fluid">
            <div class="col-lg-2 col-sm-12">
                <a href="<?php echo BASE_URL; ?>">
                    <img src="<?php echo BASE_URL; ?>assets/img/logo Ozizi.jpg" alt="logo OZIZI" class="logo">
                </a>

            </div>
            <div class="col-lg-2 col-sm-12">
                <li>
                    <a class="nav-link" href="<?php echo BASE_URL . 'principal/servicios'  ?>">Nuestros servicios </a>
                </li>
            </div>
            <div class="col-lg-2 col-sm-12">
                <li>
                    <a class="nav-link" href="<?php echo BASE_URL . 'principal/nosotros'  ?>">Acerca de nosotros </a>
                </li>
            </div>
            <div class="col-lg-2 col-sm-12">
                <div class="botones-1">

                    <a class="nav-link "></a>

                </div>
                </li>
            </div>
            <div class="col-lg-2 col-sm-12">
                <div class="botones-1">



                </div>

                <div class="navbar align-self-center d-flex">

                    <a class="nav-icon position-relative text-black <?php echo ($data['perfil'] == 'no') ? '' : 'd-none'; ?>" href="<?php echo BASE_URL . 'principal/deseo' ?>">
                        <i class="fa fa-fw fa-heart text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-util text-cian" id="btnCantidadDeseo">0</span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none <?php echo ($data['perfil'] == 'no') ? '' : 'd-none'; ?>" href="#" id="verCarrito">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-util text-black" id="btnCantidadCarrito">0</span>
                    </a>


                    

                    <?php if (!empty($_SESSION['correoUser'])) { ?>
                        <a class="nav-icon position-relative text-decoration-none" href="<?php echo BASE_URL . 'usuarios' ?>">
                            <img class="img-thumbnail" src="<?php echo BASE_URL . 'assets/img/logo Ozizi.jpg' ?>" alt="-LOGO-CLIENTE" width="50">
                        </a>
                    <?php } else { ?>
                        <a class="nav-icon position-relative text-decoration-none" href="#" data-toggle="modal" data-target="#modalLogin">
                            <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        </a>

                    <?php } ?>

                </div>
            </div>


            </div>

            <?php if (!empty($_SESSION['correoUser'])) { ?>
                <div class="col-lg-2 col-sm-12">
                    <div class="botones-2 dropdown">
                        <li class="nav-item dropdown btn-2">
                        <a class="nav-link" href="<?php echo BASE_URL . 'tutor'; ?> ">Tutor</a>

                        </li>
                    </div>
                <?php } ?>


                </div>

        </nav>

    </header>