<?php include_once 'Views/template-principal/headerTutor.php'; ?>

<!-- seccion curso -->
<section class="course-section spad">
    <div class="container">
        <div class="section-title mb-3 mt-0">
            <h2>Tematicas</h2>
            <button class="site-btn" id="nuevo_registro">
                Ingresa una nueva Tematica
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover " style="width: 100%;" id="tblTematicas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
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
                            <input type="hidden" id="idtematica" name="idtematica">
                            <input type="hidden" id="imagen_actual" name="imagen_actual">
                            <div class="form-group mb-2">
                                <label for="tematica">Tematica</label>
                                <input type="text" name="tematica" id="tematica" class="form-control" placeholder="Tematicas" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                              <label for="imagen">Imagen</label>
                              <input type="file" class="form-control-file" name="imagen" id="imagen" placeholder="" aria-describedby="fileHelpId">
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
<script src="<?php echo BASE_URL . 'assets/js/modulos/tematicas.js'; ?>"></script>



</body>





</html>