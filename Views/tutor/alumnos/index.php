<?php include_once 'Views/template-principal/headerTutor.php'; ?>

<!-- seccion curso -->
<section class="course-section spad">
    <div class="container">
        <div class="section-title mb-3 mt-0">
            <h2>Alumnos</h2>
            <button class="site-btn" id="nuevo_registro">
                Ingresa un nuevo alumno
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover " style="width: 100%;" id="tblAlumnos">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Foto</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>


    </div>
    </div>
    <div class="course-warp">

        <!-- Modal -->
        <div class="modal fade" id="nuevoModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="tittleModal"></h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">

                        </button>
                    </div>

                    <form id="frmRegistro">

                        <div class="modal-body">
                            <input type="hidden" id="id" name="id">
                            <div class="form-group mb-2">
                                <label for="nombre">Nombres</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres" aria-describedby="helpId">
                            </div>
                            <div class="form-group mb-2">
                                <label for="apellido">Apellidos</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos" aria-describedby="helpId">
                            </div>
                            <div class="form-group mb-2">
                                <label for="correo">Correo</label>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo electronico" aria-describedby="helpId">
                            </div>
                            <div class="form-group mb-2">
                                <label for="clave">Contraseña</label>
                                <input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña" aria-describedby="helpId">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit" id="btnAccion">Registrar</button>
                            <button class="btn btn-danger" data-dismiss="modal" type="button">Cancelar</button>
                        </div>
                        
                    </form>


                </div>
            </div>
        </div>
</section>


<?php include_once 'Views/template-principal/footerTutor.php'; ?>
<script src="<?php echo BASE_URL . 'assets/js/modulos/alumnos.js'; ?>"></script>



</body>





</html>