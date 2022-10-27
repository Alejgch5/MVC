<!-- Modal agregar carrito -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fas fa-fw fa-cart-arrow-down"></i>Carrito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle" id="tableListaCarrito">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Curso</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>SubTotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-around mb-3">
                <h3 id="totalGeneral"></h3>
                <?php if (!empty($_SESSION['correoUser'])) { ?>
                    <a class="btn btn-outline-primary" href="<?php echo BASE_URL . 'usuarios' ?>">Procesar pedido</a>
                <?php } else { ?>
                    <a class="btn btn-outline-primary" href="#" onclick="abrirModalLogin();">Login</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- login directo -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="tittleLogin">Iniciar Sesion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <form method="get" action="">
                    <div class="text-center">
                        <img class="img-thumbnail rounded-circle" src="<?php echo BASE_URL . 'assets/img/logo Ozizi.jpg'; ?>" alt="" width="100">
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="frmLogin">
                            <div class="form-group mb-3">
                                <label for="correoLogin"><i class="fas fa-envelope"></i>Correo</label>
                                <input type="text" name="correoLogin" id="correoLogin" class="form-control" placeholder="Correo Electronico" aria-describedby="helpId">
                            </div>
                            <div class="form-group mb-3">
                                <label for="claveLogin"><i class="fas fa-key"></i>Contraseña</label>
                                <input type="password" name="claveLogin" id="claveLogin" class="form-control" placeholder="Contraseña" aria-describedby="helpId">
                            </div>
                            <a href="#" id="btnRegister">Aun no tienes una cuenta?</a><br>
                            <a href="#" id="btnRecuperar">No recuerdas tu contraseña?</a>
                            <div class="float-end">
                                <button input name="" id="login" class="btn btn-primary btn-lg" type="button" value="">Iniciar Sesion</button>
                            </div>
                        </div>
                        <!-- formulario de rehistro -->
                        <div class="col-md-12 d-none" id="frmRegister">
                            <div class="form-group mb-3">
                                <label for="nombreRegistro"><i class="fas fa-envelope"></i>Nombres</label>
                                <input type="text" name="nombreRegistro" id="nombreRegistro" class="form-control" placeholder="Nombres" aria-describedby="helpId">
                            </div>
                            <div class="form-group mb-3">
                                <label for="apellidoRegistro"><i class="fas fa-list"></i>Apellido</label>
                                <input type="text" name="apellidoRegistro" id="apellidoRegistro" class="form-control" placeholder="Apellido" aria-describedby="helpId">
                            </div>
                            <div class="form-group mb-3">
                                <label for="correoRegistro"><i class="fas fa-envelope"></i>Correo</label>
                                <input type="text" name="correoRegistro" id="correoRegistro" class="form-control" placeholder="Correo Electronico" aria-describedby="helpId">
                            </div>
                            <div class="form-group mb-3">
                                <label for="claveRegistro"><i class="fas fa-envelope"></i>clave</label>
                                <input type="password" name="claveRegistro" id="claveRegistro" class="form-control" placeholder="Contraseña" aria-describedby="helpId">
                            </div>
                            <div class="form-group mb-3">
                                <label for="docRegistro"><i class="fas fa-key"></i>N.Documento</label>
                                <input type="text" name="docRegistro" id="docRegistro" class="form-control" placeholder="Documento" aria-describedby="helpId">
                            </div>
                            <div class="form-group mb-3">
                                <label for="generoRegistro"><i class="fa-solid fa-venus-mars"></i>genero</label>
                                <select id="generoRegistro" class="form-control" name="generoRegistro">
                                    <option value="">Seleccionar</option>
                                    <?php /*foreach ($data['nombreGenero'] as $generos) { ?>
                                    <option value="<?php echo $generos['nombre']; ?>"><?php echo $generos['nombre']; ?></option>
                                    <?php }*/ ?>
                                    <option value="1">Femenino</option>
                                    <option value="2">Masculino</option>
                                    <option value="3">Otros</option>
                                </select>
                            </div>
                            <a href="#" id="btnLogin">Ya tienes una cuenta?</a>
                            <div class="float-end">
                                <button input name="" id="registrarse" class="btn btn-primary btn-lg" type="button" value="">Registrarse</button>
                            </div>
                        </div>
                        <!-- formulario de rehistro -->
                        <div class="col-md-12 d-none" id="frmRecuperar">
                            <div class="form-group mb-3">
                                <label for="correoRecuperar"><i class="fas fa-envelope"></i>Correo</label>
                                <input type="text" name="correoRecuperar" id="correoRecuperar" class="form-control" placeholder="Correo Electronico" aria-describedby="helpId">
                            </div>
                            <div class="float-end">
                                <button input name="" id="recuperar" class="btn btn-primary btn-lg" type="button" value="">Recuperar</button>
                            </div>
                        </div>
                    </div>


            </div>

            </form>
        </div>

    </div>
</div>
<!--inicio de footer-->
<footer class="cuadro-footer">
            <div class="grupo-1">
                <div class="box">
                    <figure>
                        <a href="<?php echo BASE_URL; ?>">
                            <img src="<?php echo BASE_URL; ?>assets/img/logo_blanco.svg" alt="logo_footer">
                        </a>
                    </figure>
                </div>
                <div class="box">
                    <h2>SOBRE NOSOTROS</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, doloribus!</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, doloribus!</p>
                </div>
                <div class="box">
                    <div class="red-social">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-instagram"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-whatsapp"></a>

                    </div>
                </div>
            </div>
            <div class="grupo-2">
                <small>&copy; 2022 <b>OZIZI</b> - Todos Los Derechos Son Reservados. </small>
            </div>
        </footer>
        <!--fin del footer-->


<script src="<?php echo BASE_URL; ?>assets/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/jquery-migrate-1.2.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?php echo BASE_URL; ?>assets/js/sweetalert2.all.min.js"></script>
<script>
    const base_url = '<?php echo BASE_URL; ?>';
</script>
<script src="<?php echo BASE_URL; ?>assets/js/carrito.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/login.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/es-ES.js"></script>