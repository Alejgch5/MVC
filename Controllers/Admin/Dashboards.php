<?php

class Dashboards extends Controller
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
    
    public function index() // llama los métodos necesarios para mostrar la información en las vistas
    {
       $data = [];
       $data['perfil'] = 'no';
       $data['title'] = 'Dashboard'; // Contiene el titulo que se muestra en la pestaña del navegador

       
       // Debo llamar a los métodos de cada consulta y guardarlos en el array data
       $data['mejor_tutor'] = $this->model->getBestTeacher(); // Trae el resultado de la consulta "mejores tutores"
       $data['total_ventas'] = $this->model->getTotalSales(); // Ventas Totales
       // $data['ingresos_tutor'] = $this->model->getHighestIncome(); // Tutores con mayores ingresos
      $data['numero_genero'] = $this->model->getGenderNumber(); // Cantidad de personas por género
       
       if($data['total_genero'] = $this->model->getTotalGender()) // Cantidad total de personas con género
       {
      
            $personas=$data['total_genero']['0']['total_personas'];
            $pos=0; // variable que itera la posición del array
            foreach($data['numero_genero'] as $a) // Asigno los resultados de la operación al array $data['porcentajes]
            {
               number_format($data['porcentajes'][$pos]= ($a['cantidad_genero'] * 100) / $personas,2, ',', '.') ."<br>" ;
                $pos++;
            }
        

        }
        
       $data['ventas_mes'] = $this->model->getMonthlySales(); // Ventas por mes
       $data['total_cursos'] = $this->model->getTotalCourses(); // Total de Cursos en la plataforma
       $data['promedio_factura'] = $this->model->getAverageSales();// Promedio de factura
       
        //vista del index administrador
        $this->views->getView('dashboard', "index", $data);
    
    }
}