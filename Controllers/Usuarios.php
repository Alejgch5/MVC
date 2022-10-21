<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class Usuarios extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
        //session_destroy();
    }
    public function index()
    {
        if(empty($_SESSION['correoUser'])){
            header('location: ' . BASE_URL);
        }
        $data['perfil'] = 'si';
        $data['title'] = 'Tu perfil';
        $data['verificar'] = $this->model->getVerificar($_SESSION['correoUser']);
        $this->views->getView('principal', "perfil", $data);
    }

    public function registroDirecto()
    {
        
        if (isset($_POST['nombre']) &&  isset($_POST['clave'])){
            if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['correo']) || empty($_POST['clave']) || empty($_POST['correo']) || empty($_POST['doc'])  ){
                $mensaje = array('msg' => 'TODOS LOS CAMPOS SON REQUERIDOS', 'icono' => 'error' );
            }else {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo = $_POST['correo'];
                $clave = $_POST['clave'];
                $doc = $_POST['doc'];
                $verificar = $this->model->getVerificar($correo);
                if(empty($verificar)){
                    $token = md5($correo);
                    $hash = password_hash($clave, PASSWORD_DEFAULT);
                    $data = $this->model->registroDirecto($nombre,$apellido,$correo,$hash,$doc,$token);
                    //$this->enviarCorreo($correo, $token);
                    //exit;
                    if ($data > 0){
                        $_SESSION['correoUser'] = $correo;
                        $_SESSION['nombreUser'] = $nombre;

                        $mensaje = array('msg' => 'registrado con exito', 'icono' => 'success', 'token' => $token);
                    }else{
                        $mensaje = array('msg' => 'error al registrarse', 'icono' => 'error' );
                    }
                }else {
                    $mensaje = array('msg' => 'YA TIENES UNA CUENTA', 'icono' => 'error' );
                }
            }
            
            
            echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
            die();

        }
    }

    public function enviarCorreo()
    {
        
        if (isset($_POST['correo']) && isset($_POST['token'])){
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = HOST_SMTP;                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = USER_SMTP;                     //SMTP username
                $mail->Password   = PASS_SMTP;                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = PUERTO_SMTP;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
                //Recipients
                $mail->setFrom('alejgarcia555@gmail.com', TITLE);
                $mail->addAddress($_POST['correo']);
    
                   //Optional name
    
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Mensaje desde: ' . TITLE;
                $mail->Body    = 'Verifica tu correo electronico en nuestra plataforma de cursos<a href="'.BASE_URL.'usuarios/verificarCorreo/'.$_POST['token'].'">CONFIRME AQUI</a>';
                $mail->AltBody = 'Gracias por preferirnos';
    
                $mail->send();
                $mensaje = array('msg' => 'CORREO ENVIADO, REVISA BANDEJA DE ENTRADA - SPAM', 'icono' => 'success');
            } catch (Exception $e) {
                $mensaje = array('msg' => 'ERROR AL ENVIAR CORREO: ' . $mail->ErrorInfo, 'icono' => 'error');
            
            }

        }else{
            $mensaje = array('msg' => 'ERROR FATAL: ', 'icono' => 'error');

        }
        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
        

        
    }

    public function verificarCorreo($token)
    {
        $verificar = $this->model->getToken($token);
        if (!empty($verificar)) {
            $data = $this->model->actualizarVerify($verificar['id']);
            //print_r($data);
            header('location: ' . BASE_URL . 'usuarios');
        }
        

    }

    //LOGIN

    public function loginDirecto()
    {
        
        if (isset($_POST['correoLogin']) &&  isset($_POST['claveLogin'])){
            if (empty($_POST['correoLogin']) || empty($_POST['claveLogin'])){
                $mensaje = array('msg' => 'TODOS LOS CAMPOS SON REQUERIDOS', 'icono' => 'error' );
            }else {
                $correo = $_POST['correoLogin'];
                $clave = $_POST['claveLogin'];
                $verificar = $this->model->getVerificar($correo);
                if(!empty($verificar)){
                    //$this->enviarCorreo($correo, $token);
                    //exit;
                    if (password_verify($clave, $verificar['clave'])){
                        $_SESSION['correoUser'] = $verificar['correo'];
                        $_SESSION['nombreUser'] = $verificar['nombre'];

                        $mensaje = array('msg' => 'OK', 'icono' => 'success');
                    }else{
                        $mensaje = array('msg' => 'CONTRASEÑA INCORRECTA', 'icono' => 'error' );
                    }
                }else {
                    $mensaje = array('msg' => 'EL CORREO NO EXISTE', 'icono' => 'error' );
                }
            }
            
            
            echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
            die();

        }
    }

    //registrar pedidos

    public function registrarPedido()
    {
        $datos = file_get_contents('php://input');
        $json = json_decode($datos, true);
        $pedidos = $json['pedidos'];
        $cursos = $json['cursos'];
        if (is_array($pedidos) && is_array($cursos)) {
            $id_transaccion = $pedidos['id'];
            $monto = $pedidos['purchase_units'][0]['amount']['value'];
            $estado = $pedidos['status'];
            $fecha = date('Y-m-d H:i:s');
            $email = $pedidos['payer']['email_address'];
            $nombre = $pedidos['payer']['name']['given_name'];
            $apellido = $pedidos['payer']['name']['surname'];
            $direccion = $pedidos['purchase_units'][0]['shipping']['address']['address_line_1'];
            $ciudad = $pedidos['purchase_units'][0]['shipping']['address']['admin_area_2'];
            $email_user = $_SESSION['correoUser'];
            $data = $this->model->registrarPedido($id_transaccion, $monto, $estado, $fecha, $email, $nombre, $apellido, $direccion, $ciudad, $email_user);
            
            if ($data > 0) {
                foreach ($cursos as $curso){
                    $temp = $this->model->getDetalle($curso['idcurso']);
                    $this->model->registrarDetalle($temp['nombre'], $temp['precio'], $data);
                }
                $mensaje = array('msg' => 'OK, CURSO REGISTRADO', 'icono' => 'success');
            } else {
                $mensaje = array('msg' => 'ERROR AL REGISTRAR EL PEDIDO', 'icono' => 'error');
            }
        }else{
            $mensaje = array('msg' => 'ERROR FATAL CON LOS DATOS', 'icono' => 'error');
        }
        echo json_encode($mensaje);
        die();
    }

    //listar pednientes

    public function listarPendientes()
    {
        $data = $this->model->getPedidos(1);
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['accion'] = '<div class="text-center"><button class="btn btn-primary" type="button" onclick="verPedido('. $data[$i]['id'].')"><i class="fas fa-eye"></i></button></div>';
        }
        echo json_encode($data);
        die();
    }

    //CONSULTA RESUMEN DE COMPRA

    public function verPedido($idpedido)
    {
        $data['cursos'] = $this->model->verPedido($idpedido);
        $data['moneda'] = MONEDA;
        echo json_encode($data);
        die();
    }

    //cerrar sesion

    public function salir()
    {
        session_destroy();
        header('location: ' .  BASE_URL);
    }

    

    


}
