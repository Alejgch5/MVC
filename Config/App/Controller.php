<?php
class Controller{
    protected $model;
    public function __construct()
    {
        $this->views = new Views();
        $this->cargarModel();
    }
    public function cargarModel($folder = null, $nameModel = null)
    {
        if($folder && $nameModel)
        {
            $model = $nameModel."Model";
            $ruta = $folder.$model.".php";
            if (file_exists($ruta)) {
                require_once $ruta;
                $this->model = new $model();
            }
        }
        else
        {
            $model = get_class($this)."Model";
            $ruta = "Models/".$model.".php";
            if (file_exists($ruta)) {
                require_once $ruta;
                $this->model = new $model();
            }
        }
    }

    public function apiHeaders()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('content-type: application/json; charset=utf-8');
        header('Accept: application/json');
    }
}
 
?>