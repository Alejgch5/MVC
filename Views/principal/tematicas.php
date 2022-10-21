<?php include_once 'Views/template-principal/header.php'; ?>
<!--Fin de header-->

<!--inicio botones-->
<div class="container-fluid">
<h1 class="miscursos">Categorias</h1>


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
            <a href="<?php echo BASE_URL . 'principal/cursos/'  ?>"><button type="button" class="Categorías-btn btn">Cursos</button></a>
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

<!--inicio  categorias-->
<div class="row">
    <?php foreach ($data['tematicas'] as $tematica) {  ?>
    
    <div class="card">
        <a href="<?php echo BASE_URL . 'principal/cursostematica/' . $tematica['idtematica'];  ?>" ><img src="<?php echo BASE_URL . $tematica['imagen'] ?>" alt="talleres" class="imagen"></a>
        <h3><?php echo $tematica['tematica'] ?></h3><br>
        <!--verificar-->
    </div>
<?php } ?>
    
</div>
</div>

        <!--fin de mis cursos-->
        <br><br><br>
        <?php include_once 'Views/template-principal/footer.php'; ?>
    </body>
</html>