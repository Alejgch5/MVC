<?php include_once 'Views/template-principal/header.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
<!--Fin de header-->

<!--inicio botones-->
<div class="container-fluid">
    <h1 class="miscursos">perfil</h1>


    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-1 col-sm-12">

        </div>
        <div class="col-lg-1 col-sm-12 ">

        </div>
        <div class="col-lg-1 col-sm-12">

        </div>
        <div class="col-lg-1 col-sm-12 ">

        </div>


    </div>

    <!--fin botones-->
    <!--inicio,mis cursos-->

    <div class="container py-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pago</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Compras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Cursos</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <?php if ($data['verificar']['verify'] == 1) { ?>
                        <div class="col-md-8">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover align-middle" id="tableListaCursos">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Curso</th>
                                                    <th>Precio</th>
                                                    <th>Cantidad</th>
                                                    <th>SubTotal</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <h3 id="totalCursos"></h3>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-lg">
                                <div class="dropdown">
                                    <a class="nav-link dropdown-toggle float-right" type="button" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-user"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="<?php echo BASE_URL . 'usuarios/salir'; ?>"><i class="fas fa-times-circle">Cerrar sesion</i></a></li>
                                        
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <img class="img-thumbnail rounded-circle" src="<?php echo BASE_URL . 'assets/img/hero.jpg'; ?>" alt="" width="150">
                                    <hr>
                                    <p><?php echo $_SESSION['nombreUser']; ?></p>
                                    <p><i class="fas fa-envelope"></i><?php echo $_SESSION['correoUser']; ?></p>

                                </div>
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Paypal
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                <div id="paypal-button-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Otros metodos de pago
                                                </button>
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        <?php } else { ?>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                                <div class="h3">
                                    VERIFICA TU CORREO ELECTRONICO
                                </div>
                            </div>


                        <?php } ?>

                        </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="col-12">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-borderer table-striped table-hover" id="tblPendientes" style="width: 100%; ">
                                    <thead class="thead-dark text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Monto</th>
                                            <th>Fecha</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>


    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalPedido" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Resumen de compra</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="table-responsive">

                            <table class="table table-borderer table-striped table-hover" id="tablePedidos">
                                <thead>
                                    <tr>
                                        <th>Curso</th>
                                        <th>Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--fin de mis cursos-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <?php include_once 'Views/template-principal/footer.php'; ?>

    <script type="text/javascript" src="<?php echo BASE_URL . 'assets/DataTables/datatables.min.js'; ?>"></script>

    <script src="<?php echo BASE_URL . 'assets/js/usuarios.js'; ?>"></script>
    </body>

    </html>