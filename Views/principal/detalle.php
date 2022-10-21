<?php include_once 'Views/template-principal/header.php'; ?>
<!-- header -->


<!-- descriocion del curso -->
<section class="hero-section-single-course set-single-bg">
    <div class="container">
        <div class="hero-text-single-course text-white">
            <img alt="Node.js y Express" src="<?php echo BASE_URL . $data['detalle']['imagen']; ?>" width="150" height="250" />
            <h2><?php echo $data['detalle']['nombre']; ?></h2>
            <div>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <i class="fa-2x fa fa-star"></i>
                    </li>
                    <li class="list-inline-item">
                        <i class="fa-2x fa fa-star"></i>
                    </li>
                    <li class="list-inline-item">
                        <i class="fa-2x fa fa-star"></i>
                    </li>
                    <li class="list-inline-item">
                        <i class="fa-2x fa fa-star"></i>
                    </li>
                    <li class="list-inline-item">
                        <i class="fa-2x fa fa-star"></i>
                    </li>

                    <!-- cuenta de calificaciones -->
                    <li class="list-inline-item">
                        <h3>(0)</h3>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- descripcion del curso -->

<div class="row p-5">
    <div class="col-xs-12 col-xl-9 col-md-8 col-sm-8 col-lg-9">
        <p><?php echo $data['detalle']['descripcion']; ?></p>

        <!-- empieza secciones del curso -->
        <div class="card" id="course-curriculum">
            <div class="card-header">
                <?php echo $data['detalle']['nombre']; ?>
            </div>
            <div class="card-text">
                <p class="pl-2 pt-1 pb-0 mb-0">
                    <?php echo $data['detalle']['video']; ?>

                </p>
            </div>
        </div>
        <!-- fin secciones del curso -->
    </div>

    <div class="col-xs-12 col-xl-3 col-md-4 col-sm-4 col-lg-3">
        <!-- comienza inicio comprar curso ver curso -->
        <div class="card" id="course-sidebar">
            <div class="card-header bg-dark text-white text-center">
                Información del curso
            </div>
            <div class="card-body">
                <!-- <div class="card-text">
                    Fecha de publicación: <span class='badge badge-dark float-right'><?php echo $data['detalle']['fechasubida']; ?></span>
                </div> -->
                <div class="card-text">
                    Categoria <span class='badge badge-dark float-right'><?php echo $data['detalle']['tematica']; ?></span>
                </div>
                <div class="card-text">
                    Unidades de vídeo: <span class='badge badge-dark float-right'>1</span>
                </div>
                <div class="card-text">
                    Duración total: <span class='badge badge-dark float-right'><?php echo $data['detalle']['duracion']; ?></span>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="site-btn btn-block">
                    Tomar curso por <?php echo MONEDA . '' . $data['detalle']['precio']; ?>
                </a>
            </div>

        </div>
    </div>
</div>

<!--inicio botones-->
<div class="container-fluid">
    <h1 class="miscursos">Relacionados</h1>


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


    </div>

    <!--fin botones-->

    <!--inicio,mis cursos relacionados-->
    <div class="row">
        <?php foreach ($data['relacionados'] as $relacion) { ?>



            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo BASE_URL . $relacion['imagen'] ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $relacion['nombre'] ?></h5>
                    <p class="card-text"><?php echo $relacion['descripcioncorta'] ?></p>
                    <a href="<?php echo BASE_URL . 'principal/detalle/' . $relacion['idcurso']  ?>" class="btn btn-primary">Ver curso</a>
                    <a href="#" prod="<?php echo $relacion['idcurso'] ?>" class="btn btn-warning btnAddDeseo"><i class="fas fa-heart"></i></a>
                    <a href="#" prod="<?php echo $relacion['idcurso'] ?>" class="btn btn-success btnAddCarrito"><i class="fas fa-cart-plus"></i></a>
                </div>
            </div><?php } ?>
    </div>
    <!--fin de mis cursos-->
    <?php include_once 'Views/template-principal/footer.php'; ?>
    </body>


    </html>