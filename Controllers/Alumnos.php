<?php
class Alumnos extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        //session_destroy();
    }
    public function index()
    {

        $data['title'] = 'Mira tus estudiantes';
        $this->views->getView('tutor/alumnos', "index", $data);
    }

    public function listar()
    {
        $data = $this->model->getAlumnos(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['accion'] = '<div class="d-flex">
            <button class="btn btn-primary" type="button" onclick="editUser(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="eliminarUser(' . $data[$i]['id'] . ')"><i class="fas fa-trash"></i></button>
        </div>';
        }
        echo json_encode($data);
        die();
    }

    public function registrar()
    {
        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];
            $id = $_POST['id'];
            $hash = password_hash($clave, PASSWORD_DEFAULT);
            if (empty($_POST['nombre']) || empty($_POST['apellido'])) {
                $respuesta = array('msg' => 'Todos los campos son requeridos', 'icono' => 'warning');
            } else {
                if (empty($id)) {
                    $result = $this->model->verificarCorreo($correo);
                    if (empty($result)) {
                        $data = $this->model->registrar($nombre, $apellido, $correo, $hash);
                        if ($data > 0) {
                            $respuesta = array('msg' => 'Usuario registrado correctamente', 'icono' => 'success');
                        } else {
                            $respuesta = array('msg' => 'Error al registrar', 'icono' => 'error');
                        }
                    } else {
                        $respuesta = array('msg' => 'Correo ya existe', 'icono' => 'warning');
                    }
                } else {
                    $result = $this->model->verificarCorreo($correo);
                    if (empty($result)) {
                        $data = $this->model->modificar($nombre, $apellido, $correo, $id);
                        if ($data == 1) {
                            $respuesta = array('msg' => 'Usuario modificado correctamente', 'icono' => 'success');
                        } else {
                            $respuesta = array('msg' => 'Error al modificar', 'icono' => 'error');
                        }
                    } else {
                        $respuesta = array('msg' => 'Correo ya existe', 'icono' => 'warning');
                    }
                }
            }
            echo json_encode($respuesta);
        }

        die();
    }

    public function delete($idUser)
    {
        if (is_numeric($idUser)) {
            $data = $this->model->eliminar($idUser);
            if ($data == 1) {
                $respuesta = array('msg' => 'Estudiante eliminado correctamente', 'icono' => 'success');
            } else {
                $respuesta = array('msg' => 'Error al eliminar', 'icono' => 'error');
            }
        } else {
            $respuesta = array('msg' => 'Error desconocido', 'icono' => 'error');
        }
        echo json_encode($respuesta);
        die();
    }

    public function edit($idUser)
    {
        if (is_numeric($idUser)) {
            $data = $this->model->getAlumno($idUser);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }

        die();
    }
}
