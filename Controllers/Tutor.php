<?php
class Tutor extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        //session_destroy();
    }
    public function index()
    {

        $data['title'] = 'Crea un curso';
        $this->views->getView('tutor', "login", $data);
    }

    public function validar()
    {
        if (isset($_POST['email']) &&  isset($_POST['clave'])) {
            if (empty($_POST['email']) || empty($_POST['clave'])) {
                $respuesta = array('msg' => 'todo los campos son requeridos', 'icono' => 'warning');
            } else {
                $data = $this->model->getUsuario($_POST['email']);
                if (empty($data)) {
                    $respuesta = array('msg' => 'el correo no existe', 'icono' => 'error');
                } else {
                    if (password_verify($_POST['clave'], $data['clave'])) {
                        $_SESSION['email'] = $data['correo'];
                        $_SESSION['nombre'] = $data['nombre'];
                        $respuesta = array('msg' => 'datos correctos', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'contraseña incorrecta', 'icono' => 'warning');
                    }
                }
            }
        } else {
            $respuesta = array('msg' => 'error desconocido', 'icono' => 'error');
        }
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function home()
    {
        $data['title'] = 'Crea un curso';
        $this->views->getView('tutor/views', "index", $data);
    }

    
}
