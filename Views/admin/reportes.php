<?php ob_start(); ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE . '-' . $data['title']; ?></title>
</head>
<body>
    <?php require_once('configAdmin/ConexionAdmin.php'); ?>
    <!-- debo hacer la tabla manualmente, debo darle estilos al documento a parte porque con bootstrap no funciona y llamar los datos de las consultas -->
</body>
</html>
<?php 
    // obtienen el contenido del html
    $html=ob_get_clean(); 

    // para que cargue el autoload.inc.php
    require '../../assets/libreriasAdmin/dompdf/autoload.inc.php';
    //usar la libreria dompdf
    use Dompdf\Dompdf;
    //instanciar la clase
    $dompdf = new Dompdf();

    //asi se carga EL DISEÑO Y LOS DATOS EN EL HTML
    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf->setOptions($options);

    $dompdf->loadHtml($html);//cargsr el contenido html
    $dompdf->setPaper('letter');
    // $dompdf->setPaper('A4', 'landscape');
    // horizontal
    $dompdf->render();
    $dompdf->stream("Reportes.pdf", array("Attachment" => false));
?>