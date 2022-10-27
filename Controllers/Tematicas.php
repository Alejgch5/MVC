<?php
class Tematicas extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        //session_destroy();

         //valida el inicio de sesion y limita el acceso al administrador
         if(empty($_SESSION['correoUser'])) {
            header('location: ' . BASE_URL);
          }
          else if($_SESSION['rol'] == 1) {
            header('location: ' . BASE_URL . "dashboards");
          }
    }
    public function index()
    {

        $data['title'] = 'Crea tu tematica';
        $this->views->getView('tutor/tematicas', "index", $data);
    }

    public function listar()
    {
        $data = $this->model->getTematicas(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['imagen'] = ' <img class="img-thumbnail" src="'.$data[$i]['imagen'].'" alt="'.$data[$i]['tematica'].'" width="50">';
            $data[$i]['accion'] = '<div class="d-flex">
            <button class="btn btn-primary" type="button" onclick="editTe(' . $data[$i]['idtematica'] . ')"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="eliminarTe(' . $data[$i]['idtematica'] . ')"><i class="fas fa-trash"></i></button>
        </div>';
        }
        echo json_encode($data);
        die();
    }

    public function registrar()
    {
        if (isset($_POST['tematica'])) {
            $tematica = $_POST['tematica'];
            $imagen = $_FILES['imagen'];
            $tmp_name = $imagen['tmp_name'];
            $idtematica = $_POST['idtematica'];
            $ruta = 'assets/img/tematicas/';
            $nombreImg = date('YmdHis');
            if (empty($_POST['tematica'])) {
                $respuesta = array('msg' => 'Todos los campos son requeridos', 'icono' => 'warning');
            } else {
                if (!empty($imagen['name'])) {
                    $destino = $ruta . $nombreImg . '.jpg';
                } else if (!empty($_POST['imagen_actual']) && empty($imagen['name'])) {
                    $destino = $_POST['imagen_actual'];
                } else {
                    $destino = $ruta . 'default.png';
                }

                if (empty($idtematica)) {
                    $result = $this->model->verificarTematica($tematica);
                    if (empty($result)) {
                        $data = $this->model->registrar($tematica, $destino);
                        if ($data > 0) {
                            if (!empty($imagen['name'])) {
                                move_uploaded_file($tmp_name, $destino);
                            }
                            $respuesta = array('msg' => 'Tematica registrada correctamente', 'icono' => 'success');
                        } else {
                            $respuesta = array('msg' => 'Error al registrar', 'icono' => 'error');
                        }
                    } else {
                        $respuesta = array('msg' => 'La tematica ya existe', 'icono' => 'warning');
                    }
                } else {

                    $data = $this->model->modificar($tematica, $destino, $idtematica);
                    if ($data == 1) {
                        if (!empty($imagen['name'])) {
                            move_uploaded_file($tmp_name, $destino);
                        }
                        $respuesta = array('msg' => 'Tematica modificado correctamente', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al modificar', 'icono' => 'error');
                    }
                }
            }
            echo json_encode($respuesta);
        }

        die();
    }

    public function delete($idTe)
    {
        if (is_numeric($idTe)) {
            $data = $this->model->eliminar($idTe);
            if ($data == 1) {
                $respuesta = array('msg' => 'Tematica eliminada correctamente', 'icono' => 'success');
            } else {
                $respuesta = array('msg' => 'Error al eliminar', 'icono' => 'error');
            }
        } else {
            $respuesta = array('msg' => 'Error desconocido', 'icono' => 'error');
        }
        echo json_encode($respuesta);
        die();
    }

    public function edit($idTe)
    {
        if (is_numeric($idTe)) {
            $data = $this->model->getTematica($idTe);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }

        die();
    }
}
