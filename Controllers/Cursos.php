<?php
class Cursos extends Controller
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
          else if(!empty($_SESSION['rol']) && $_SESSION['rol'] == 1) {
            header('location: ' . BASE_URL . "dashboards");
          }
    }
    public function index()
    {
        if (empty($_SESSION['correoUser'])) {
            header('location: ' . BASE_URL);
        }

        $data['title'] = 'Crea tu curso';
        $data['tematicas'] = $this->model->getTematicas();
        $this->views->getView('tutor/cursos', "index", $data);
    }

    public function listar()
    {
        if (empty($_SESSION['correoUser'])) {
            header('location: ' . BASE_URL);
        }
        $data = $this->model->getProductos(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['imagen'] = ' <img class="img-thumbnail" src="' . $data[$i]['imagen'] . '" alt="' . $data[$i]['nombre'] . '" width="50">';
            $data[$i]['accion'] = '<div class="d-flex">
            <button class="btn btn-primary" type="button" onclick="editCur(' . $data[$i]['idcurso'] . ')"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="eliminarCur(' . $data[$i]['idcurso'] . ')"><i class="fas fa-trash"></i></button>
        </div>';
        }
        echo json_encode($data);
        die();
    }

    public function registrar()
    {
        if (empty($_SESSION['correoUser'])) {
            header('location: ' . BASE_URL);
        }
        if (isset($_POST['nombre']) && isset($_POST['precio'])) {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $video = $_POST['video'];
            $tematica = $_POST['tematica'];

            $imagen = $_FILES['imagen'];
            $tmp_name = $imagen['tmp_name'];
            $idcurso = $_POST['idcurso'];
            $ruta = 'assets/img/cursos/';
            $nombreImg = date('YmdHis');
            if (empty($nombre) || empty($precio) || empty($descripcion) ||  empty($video)) {
                $respuesta = array('msg' => 'Todos los campos son requeridos', 'icono' => 'warning');
            } else {
                if (!empty($imagen['name'])) {
                    $destino = $ruta . $nombreImg . '.jpg';
                } else if (!empty($_POST['imagen_actual']) && empty($imagen['name'])) {
                    $destino = $_POST['imagen_actual'];
                } else {
                    $destino = $ruta . 'default.png';
                }

                if (empty($idcurso)) {
                    $data = $this->model->registrar($nombre, $descripcion, $precio, $video, $destino, $tematica);
                    if ($data > 0) {
                        if (!empty($imagen['name'])) {
                            move_uploaded_file($tmp_name, $destino);
                        }
                        $respuesta = array('msg' => 'Curso registrado correctamente', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al registrar', 'icono' => 'error');
                    }
                } else {

                    $data = $this->model->modificar($nombre, $descripcion, $precio, $video, $destino, $tematica, $idcurso);
                    if ($data == 1) {
                        if (!empty($imagen['name'])) {
                            move_uploaded_file($tmp_name, $destino);
                        }
                        $respuesta = array('msg' => 'Curso modificado correctamente', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al modificar', 'icono' => 'error');
                    }
                }
            }
            echo json_encode($respuesta);
        }

        die();
    }

    public function delete($idCur)
    {
        if (empty($_SESSION['correoUser'])) {
            header('location: ' . BASE_URL);
        }
        if (is_numeric($idCur)) {
            $data = $this->model->eliminar($idCur);
            if ($data == 1) {
                $respuesta = array('msg' => 'Curso eliminada correctamente', 'icono' => 'success');
            } else {
                $respuesta = array('msg' => 'Error al eliminar', 'icono' => 'error');
            }
        } else {
            $respuesta = array('msg' => 'Error desconocido', 'icono' => 'error');
        }
        echo json_encode($respuesta);
        die();
    }

    public function edit($idCur)
    {
        if (empty($_SESSION['correoUser'])) {
            header('location: ' . BASE_URL);
        }
        if (is_numeric($idCur)) {
            $data = $this->model->getCurso($idCur);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }

        die();
    }
}
