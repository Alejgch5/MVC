<?php include_once 'Views/template-principal/header.php'; ?>
            <!--cards-->
            <h1 class="titulo1">Nuestros servicios</h1>
            
            <div class="container nuestros">

                <div class="card">
                    <img src="<?php echo BASE_URL; ?>assets/img/talleres.jpeg" alt="talleres" class="imagen">
                    <h3>Talleres</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                       Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown 
                       printer took a galley of type and scrambled it to make a type specimen book. 
                    </p>
                </div>

                <div class="card">
                    <img src="<?php echo BASE_URL; ?>assets/img/asesorias.jpeg" alt="talleres" class="imagen">
                    <h3>Asesorias</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                       Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown 
                       printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                </div>

                <div class="card">
                    <a href="<?php echo BASE_URL . 'principal/cursos/'  ?>" ><button><img src="<?php echo BASE_URL; ?>assets/img/cursos.jpeg" alt="talleres" class="imagen">
                    <h3>Cursos</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                       Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown 
                       printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                </div></button></a>
            </div>
            <br><br><br><br>
            <?php include_once 'Views/template-principal/footer.php'; ?>
    </body>
</html>