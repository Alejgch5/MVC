<?php
class Principal extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }

    //vista servicios

    public function servicios()
    {
        $data['perfil'] = 'no';
        $data['title'] = 'Servicios';
        $this->views->getView('principal', "servicios", $data);
    }

    public function nosotros()
    {
        $data['perfil'] = 'no';
        $data['title'] = 'Nuestro Equipo';
        $this->views->getView('principal', "nosotros", $data);
    }
    public function cursos($page)
    {
        $data['perfil'] = 'no';
        $pagina = (empty($page)) ? 1 : $page;
        $porPagina = 4;
        $desde = ($pagina - 1) * $porPagina;
        $data['title'] = 'Cursos';
        $data['Cursos'] = $this->model->getCursos($desde , $porPagina);
        $data['pagina'] = $pagina;
        $total = $this->model->getTotalCursos();
        //print_r($total);
        //exit;
        $data['total'] = ceil($total['total'] / $porPagina);
        
        
        //print_r($data); 
        //exit; 
        $this->views->getView('principal', "cursos", $data);
    }
    public function tematicas()
    {
        $data['perfil'] = 'no';
        $data['title'] = 'tematicas';
        $data['tematicas'] = $this->model->getTematicas();
        //print_r($data); pruebas
        //exit; pruebas
        $this->views->getView('principal', "tematicas", $data);
    }

    public function detalle($idcurso)
    {
        $data['perfil'] = 'no';
        $data['detalle'] = $this->model->getDetalle($idcurso);
        $idtematica = $data['detalle']['idtematica'];
        $data['relacionados'] = $this->model->getAleatorios($idtematica, $data['detalle']['idcurso']);
        $data['title'] = $data['detalle']['nombre'];
        $this->views->getView('principal', "detalle", $data);
    }
    public function cursostematica($datos)
    {
        $data['perfil'] = 'no';
        $idtematica = 1;
        $page = 1;
        $array = explode(',', $datos);
        if (isset($array[0])) {
            if(!empty($array[0])){
                $idtematica = $array[0];

            }
        }
        if (isset($array[1])) {
            if(!empty($array[1])){
                $page = $array[1];

            }
        }

        $pagina = (empty($page)) ? 1 : $page;
        $porPagina = 1;
        $desde = ($pagina - 1) * $porPagina;

        $data['pagina'] = $pagina;
        $total = $this->model->getTotalCursosTe($idtematica);
        //print_r($total);
        //exit;
        $data['total'] = ceil($total['total'] / $porPagina);

        $data['cursostematica'] = $this->model->getCursosTematica($idtematica, $desde, $porPagina);
        $data['title']  = 'categorias';
        $data['idtematica']  = $idtematica;
        $this->views->getView('principal', "cursostematica", $data);
    }

    //vista deseos
    public function deseo()
    {
        $data['perfil'] = 'no';
        $data['title'] = 'Tu lista deseo';
        $this->views->getView('principal', "deseo", $data);
    }

    

    //ver cursos carrito

    public function listaCursos()
    {
        $datos = file_get_contents('php://input');
        $json = json_decode($datos, true);
        $array['cursos'] = array();
        $total = 0.00;
        if (!empty($json)) {
            foreach ($json as $curso){
                $result = $this->model->getListaDeseo($curso['idcurso']);
                $data['idcurso'] = $result['idcurso'];
                $data['nombre'] = $result['nombre'];
                $data['precio'] = $result['precio'];
                $data['cantidad'] = $curso['cantidad'];
                $data['imagen'] = $result['imagen'];
                $subTotal = $result['precio'] * $curso['cantidad'];
                $data['subTotal'] = number_format($subTotal);
                array_push($array['cursos'], $data);
                $total += $subTotal; 
    
            }
        }
        
        $array['total'] = number_format($total);
        $array['totalPaypal'] = $total;
        $array['moneda'] = MONEDA;
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        die();
    }

    
    

}