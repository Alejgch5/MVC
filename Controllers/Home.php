<?php
class Home extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
        //session_destroy();

        //valida el inicio de sesion y limita el acceso al administrador
        if(!empty($_SESSION['rol']) && $_SESSION['rol'] == 1) {
            header('location: ' . BASE_URL . "dashboards");
          }
    }
    public function index()
    {
        $data['perfil'] = 'no';
        $data['title'] = 'Pagina Principal';
        $this->views->getView('home', "index", $data);
    }

}

   