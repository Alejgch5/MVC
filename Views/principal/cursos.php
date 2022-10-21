<?php include_once 'Views/template-principal/header.php'; ?>
<!--Fin de header-->

<!--inicio botones-->
<div class="container-fluid">
    <h1 class="miscursos">Cursos</h1>


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
            <button class="Alfabetico btn" type="button">Alfabético</button>
        </div>
        <div class="col-lg-1 col-sm-12 ">
            <a href="<?php echo BASE_URL . 'principal/tematicas/'  ?>"><button type="button" class="Categorías-btn btn">Categorías</button></a>
        </div>
        <div class="col-lg-1 col-sm-12">
            <button type="button" class="  Alfabetico btn "><i class="fa-solid fa-qrcode"></i>
            </button>
        </div>
        <div class="col-lg-1 col-sm-12 ">
            <button type="button" class="btn Alfabetico btn"><i class="fa-solid fa-align-justify"></i></button>
        </div>


    </div>

    <!--fin botones-->

    <!--inicio,mis cursos-->
    <div class="row">
        <?php foreach ($data['Cursos'] as $Cursos) { ?>



            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo BASE_URL . $Cursos['imagen'] ?>" alt="Card image cap">

                <div class="card-body">
                    <h5 class="card-title"><?php echo $Cursos['nombre'] ?></h5>
                    <p class="card-text"><?php echo $Cursos['descripcion'] ?></p>
                    <a href="<?php echo BASE_URL . 'principal/detalle/' . $Cursos['idcurso']  ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    <a href="#" prod="<?php echo $Cursos['idcurso'] ?>" class="btn btn-warning btnAddDeseo"><i class="fas fa-heart"></i></a>
                    <a href="#" prod="<?php echo $Cursos['idcurso'] ?>" class="btn btn-success btnAddCarrito"><i class="fas fa-cart-plus"></i></a>
                </div>
            </div><?php } ?>
    </div>

    <!---   paginacion      --->


    <div div="row">
        <ul class="pagination pagination-lg justify-content-end">
            <?php
            $anterior = $data['pagina'] - 1;
            $siguiente = $data['pagina'] + 1;
            $url = BASE_URL . 'principal/cursos/';
            if ($data['pagina'] > 1) {
                echo '<li class="page-item ">
    <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="' . $url .  $anterior . '"
        >Anterior</a>
    </li>';
            }
            if ($data['total'] >= $siguiente) {
                echo '<li class="page-item">
    <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark"
        href="' . $url .  $siguiente . '">Siguiente</a>
    </li>';
            }

            ?>

            </vl>
    </div>
</div>
<!--fin de mis cursos-->
<?php include_once 'Views/template-principal/footer.php'; ?>
</body>

</html>