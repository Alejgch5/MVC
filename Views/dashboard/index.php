<?php
 require 'Views/template-admin/headerAdmin.php'; //header administrador
// require 'Models/Admin/DashboardModel.php'; //archivo que tiene las consultas sql
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="Views/dashboard/descarga.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Respaldar Base de Datos</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Ventas Totales Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Ventas Totales</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php //formatea el resultado de la consulta guardada en la variable $totalVentas, la consulta está guardada en el archivo DashboardModel.php
                                                                                
                                                                                echo number_format($data['total_ventas']['total_vendido'], 0, ',', '.');
                                                                                ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cantidad de cursos Existentes Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Cantidad de Cursos Existentes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php //formatea el resultado de la consulta guardada en la variable $cantidadCursos, la consulta está guardada en el archivo DashboardModel.php
                                                                                echo number_format($data['total_cursos']['0']['cantidad_cursos'], 0, ',', '.');
                                                                                ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Valor promedio por factura Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Valor promedio por Factura
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php //formatea el resultado de la consulta guardada en la variable $promedioFact, la consulta está guardada en el archivo DashboardModel.php
                                                                                                echo number_format($data['promedio_factura']['0']['promedio_ventas'], 0, ',', '.');
                                                                                                ?></div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function grafica() {
            graficasBar(), graficasPie()
        }
        // window.onload = function grafica2(){}
    </script>
    <!-- almaceno temporalmente los resultados de la consulta en un input, esto es leído por el aechivo graficas.js -->
    <input type="hidden" id="datosGraficaGenero" value="<?php foreach ($data['numero_genero'] as $a) {
                                                            echo $a['cantidad_genero'] . ",";
                                                        } ?>">
    <input type="hidden" id="datosGraficaMesValor" value="<?php foreach ($data['ventas_mes'] as $a) {
                                                                echo $a['total_ventas'] . ",";
                                                            } ?>">
    <input type="hidden" id="datosGraficaMes" value="<?php foreach ($data['ventas_mes'] as $a) {
                                                            echo $a['mes'] . ",";
                                                        } ?>">
    <input type="hidden" id="datosGraficaAño" value="<?php foreach ($data['ventas_mes'] as $a) {
                                                            echo $a['year(now())'] . ",";
                                                        } ?>">

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">Ventas por mes en el año actual (<?php                      
                                                                echo $data['ventas_mes']['0']['year(now())'] ; ?>)</h5>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>

            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">Cantidad de personas por genero</h5>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">                <!-- debo imprimir el array que tiene los porcentajes -->
                            <i class="fas fa-circle text-primary"></i> Femenino <?php echo number_format($data['porcentajes']['0'],2, ',', '.') ?> % <br>
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Masculino <?php echo number_format($data['porcentajes']['1'],2, ',', '.') ?> % <br>
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Otros <?php echo number_format($data['porcentajes']['2'],2, ',', '.') ?> % <br>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    

       
        
        <div class="row"> 
            <!-- <div class="col-lg-12 mb-4"> -->

            <!-- Approach -->
            <div class="card col-lg-5 mr-3 shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary text-center">Tutores con más ingresos</h5>
                </div>
                <div class="h5 mb-0 mr-3 text-gray-800">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><b>Nombre Tutor</b></th>
                                            <th><b>Ingresos</b></th>
                                            <th><b>Ventas</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //formatea el resultado de la consulta guardada en la variable $data['ingresos_tutor'] , la consulta está guardada en el archivo DashboardModel.php
                                        //foreach ($data['ingresos_tutor'] as $a) {;

                                        ?>
                                            <!-- <tr>
                                                <td><?php //echo $a['nombre_tutor'] . ",";  ?></td>

                                                <td><?php //echo  "<b>$ </b>" . number_format($a['venta_total'], 0, ',', '.') . ",";
                                                 ?></td>
                                                <td><?php //echo $a['cursos_Vendidos']; } ?></td>
                                            </tr> -->
                                            <tr>
                                                <td>Juan david alzate</td>
                                                <td>250000</td>
                                                <td>1</td>
                                            </tr>
                                            <tr>
                                                <td>Josselyn Ambrogini</td>
                                                <td>123000</td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <td>Joanna Ofield</td>
                                                <td>78650</td>
                                                <td>1</td>
                                            </tr>
                                            <tr>
                                                <td>lucy kane</td>
                                                <td>30000</td>
                                                <td>1</td>
                                            </tr>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Illustrations -->
            <div class="card col-lg-6 shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary text-center">Tutores Mejor calificados</h5>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 text-gray-800">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th><b># Ranking Tutores</b></th>
                                                        <th><b>Nombre Tutor</b></th>
                                                        <th><b>Calificación</b></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php //Se imprime los datos de la consulta "mejor tutor", la consulta está guardada en el archivo DashboardModel.php
                                                    //echo var_dump($MejorTutor= $data['MejorTutor']);
                                                    $i = 1;
                                                    foreach ($data['mejor_tutor'] as $key => $item) {;

                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $item['nombre_tutor'] . ",";  ?></td>

                                                            <td><?php echo  number_format($item['calificacion'], 2, ',', '.') . ",";
                                                            $i++;
                                                            } ?></td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
   
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; OZIZI 2022</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



</body>

</html>