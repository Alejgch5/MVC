<?php include_once 'Views/template-principal/headerTutor.php'; ?>

<!-- seccion curso -->
<section class="course-section spad">
    <div class="container">
        <div class="section-title mb-3 mt-0">
            <h2>Tus cursos</h2>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Crear curso</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover " style="width: 100%;" id="tblCursos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Presentacion</th>
                                    <th>Imagen</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form id="frmRegistro">

                        <div class="modal-body">
                            <input type="hidden" id="idcurso" name="idcurso">
                            <input type="hidden" id="imagen_actual" name="imagen_actual">
                            <div class="form-group mb-2">
                                <label for="nombre">Titulo</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Titulo" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text"class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input type="text"class="form-control" name="precio" id="precio" placeholder="Precio" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="tematica">Tematica</label>
                                <select id="tematica" class="form-control" name="tematica">
                                    <option value="">Seleccionar</option>
                                    <?php foreach ($data['tematicas'] as $tematica) { ?>
                                    <option value="<?php echo $tematica['idtematica']; ?>"><?php echo $tematica['tematica']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="video">Añade el Iframe de la Presentacion</label>
                                <textarea id="video" name="video" class="ckeditor" rows="5" id="ckeditor"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="imagen">Añade la imagen a tu curso</label>
                                <input type="file" class="form-control-file" name="imagen" id="imagen" placeholder="" aria-describedby="fileHelpId">
                            </div>
                        </div>

                        <div class="text-end">
                            <button class="btn btn-primary" type="submit" id="btnAccion">Crear curso</button>
                        </div>

                    </form>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>

        </div>



    </div>
    </div>
    <div class="course-warp">
</section>


<?php include_once 'Views/template-principal/footerTutor.php'; ?>
<script src="<?php echo BASE_URL . 'assets/js/modulos/cursos.js'; ?>"></script>



</body>





</html>