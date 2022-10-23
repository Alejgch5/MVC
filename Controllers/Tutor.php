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
        $this->views->getView('tutor/views', "index", $data);
    }


    public function home()
    {
        $data['title'] = 'Crea un curso';
        $this->views->getView('tutor/views', "index", $data);
    }

    
}
