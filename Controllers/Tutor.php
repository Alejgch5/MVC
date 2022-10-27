<?php
class Tutor extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        //session_destroy();

         //valida el inicio de sesion y limita el acceso al administrador
         if(empty($_SESSION['correoUser']) || !empty($_SESSION['rol']) && $_SESSION['rol'] == 1){
            header('location: ' . BASE_URL);
          }
    }
    public function index()
    {
        if (empty($_SESSION['correoUser'])) {
            header('location: ' . BASE_URL);
        }

        $data['title'] = 'Crea un curso';
        $this->views->getView('tutor/views', "index", $data);
    }


    public function home()
    {
        if (empty($_SESSION['correoUser'])) {
            header('location: ' . BASE_URL);
        }
        $data['title'] = 'Crea un curso';
        $this->views->getView('tutor/views', "index", $data);
    }

    
}
