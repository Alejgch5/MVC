<?php

class Thematics extends Controller
{
    public function __construct() {
        parent::__construct();
        $this->cargarModel('Models/Admin/','Dashboard');
        session_start();

        // para evitar que accedan sin logueo
        if(empty($_SESSION['correoUser']) || $_SESSION['rol'] == 2){
            header('location: ' . BASE_URL);
          }
    }

    public function index()
    {
       $data = [];
       $data['perfil'] = 'no';
       $data['title'] = 'Temáticas';

       $data['thematics'] = $this->model->getThematic();

       // Vista control temáticas
       $this->views->getView('admin', "tables", $data);
    }

    public function insert()
    {
        $this->apiHeaders(); // Trae las cabeceras que evitan conflictos con el sevidor
        $request = file_get_contents('php://input');
        $data = json_decode($request, true);

        $response = [
            'message' => '',
            'type' => '',
            'status' => false
        ];
        //reinicia los nombres del array
        $data = [
            'tematica' => $data['nombre'],
        ];
        
       if(isset($data['tematica']))
       {
         if(!$this->model->validateThematic($data)) // verifica que el nombre de la temática no esté repetido
         {
            if($this->model->insertThematic($data))
            {
                // create thematic
                $response['message'] = "La Temática ha sido creada con exito";
                $response['type'] = 'success';
                $response['status'] = true;
            }
            else
            {
                $response['message'] = "La Temática no pudo ser creada";
                $response['type'] = 'error';
            }
         }
         else
         {
            $response['message'] = "Ya existe una temática con ese nombre";
            $response['type'] = 'error';
         }

         echo json_encode($response);
       } 
    }

    public function update()
    {
        $this->apiHeaders(); // Trae las cabeceras que evitan conflictos con el sevidor
        $request = file_get_contents('php://input');
        $data = json_decode($request, true);

        $response = [
            'message' => '',
            'type' => '',
            'status' => false
        ];
        
        $data = [
            'tematica' => $data['nombre'],
            'idtematica' => $data['codigo']
        ];

       if(isset($data['tematica']) && isset($data['idtematica']))
       {
         if(!$this->model->validateThematic($data,$data['idtematica'])) // verifica que el nombre de la temática no esté repetido
         {
            if($this->model->updateThematic($data)) 
            {
                // update thematic
                $response['message'] = "La Temática ha sido modificada con exito";
                $response['type'] = 'success';
                $response['status'] = true;
            }
            else
            {
                $response['message'] = "La Temática no pudo ser modificada";
                $response['type'] = 'error';
            }
         }
         else
         {
            $response['message'] = "Ya existe una temática con ese nombre";
            $response['type'] = 'error';
         }

         echo json_encode($response);
       } 
    }

    public function delete()
    {
        $this->apiHeaders(); // Trae las cabeceras que evitan conflictos con el sevidor
        $request = file_get_contents('php://input');
        $data = json_decode($request, true);

        $response = [
            'message' => '',
            'type' => '',
            'status' => false
        ];

        if(isset($data['codigo']))
        {
            if($this->model->deleteThematic($data['codigo']))
            {
                // Delete thematics
                $response['message'] = "La Temática ha sido eliminada con exito";
                $response['type'] = 'success';
                $response['status'] = true;
            }
            else
            {
                $response['message'] = "La Temática no pudo ser eliminada";
                $response['type'] = 'error';
            }

            echo json_encode($response);
        } 
    }
}