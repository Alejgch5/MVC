<?php 
//echo password_hash('tutor', PASSWORD_DEFAULT); exit; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>OZIZI</title>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/img/logo_blanco.svg" type="image/x-icon">
</head>

<body class="portadafondocompleto">
    <div class="container-fluid text-center">
        <div class="row">
            <a href="index.php" class="bnt-atras">Atrás</a>
        </div>
        <div class="tutor-sesión">
            <div class="modal-content">
                <div class="col-12 mi-cuenta">
                    <h1>Mi cuenta</h1>
                </div>
                <div class="col-12 user-img">
                    <img src="<?php echo BASE_URL; ?>assets/img/perfil-del-usuario-tutor.png" />
                </div>
                <form class="col-12" id="formulario">
                    <div class="form-group inputlogin">
                        <input type="text" name="email" id="email" value="juandavidag4@gmail.com" class="form-control" placeholder="Email"  >
                    </div>
                    <div class="form-group inputlogin">
                        <input type="password" name="clave" id="clave" value="tutor" class="form-control" placeholder="Contraseña">
                    </div>
                    <div>
                        <a href="#">¿Olvidó la contraseña?</a>
                    </div>
                    <button type="submit" value="Iniciar sesion" class="btn btn-primary btninisiarsesión">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo BASE_URL . 'assets/js/modulos/login.js'; ?>"></script>
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
</body>

</html>