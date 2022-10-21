<?php
class Home extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
        //session_destroy();
    }
    public function index()
    {
        $data['perfil'] = 'no';
        $data['title'] = 'Pagina Principal';
        $this->views->getView('home', "index", $data);
    }

}

   