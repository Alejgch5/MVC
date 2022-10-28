<?php
class CursosModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function getProductos($estado)//trae los cursos que ha creado el usuario
    {
        $tutor = $_SESSION['idUser'];

       // $sql = "SELECT * FROM tblcurso WHERE estado = $estado";

       //trae todos los datos de la tabla curso y también de la tabla usuarios
        // $sql = "SELECT * FROM tblcurso INNER JOIN tblusuarios ON tblcurso.idtutor = tblusuarios.id WHERE tblusuarios.id = $tutor AND tblcurso.estado = $estado;";

        $sql = "SELECT tblcurso.idcurso, tblcurso.nombre, tblcurso.duracion, tblcurso.video, tblcurso.precio, tblcurso.descripcioncorta, tblcurso.descripcion, tblcurso.idtematica, tblcurso.imagen, tblcurso.estado, tblcurso.idtutor FROM tblcurso INNER JOIN tblusuarios ON tblcurso.idtutor = tblusuarios.id WHERE tblusuarios.id = $tutor AND tblcurso.estado = $estado;";
        return $this->selectAll($sql);
    }
    
    public function getTematicas() // Trae las temáticas que son visibles (con estado 1)
    {
        $sql = "SELECT * FROM tbltematica WHERE estado = 1";
        return $this->selectAll($sql);
    }

    public function registrar($nombre, $descripcion, $precio, $video, $imagen, $tematica) // Registra un curso nuevo
    {
        $tutor = $_SESSION['idUser'];

        $sql = "INSERT INTO  tblcurso (nombre, descripcion, precio, video, imagen, idtematica, idtutor) VALUES (?,?,?,?,?,?,?)";
        $array = array($nombre, $descripcion, $precio, $video, $imagen, $tematica, $tutor);
        return $this->insertar($sql, $array);
        
    }

    public function eliminar($idCur) // Elimina un curso
    {
        $sql = "UPDATE tblcurso SET estado = ? WHERE idcurso = ? ";
        $array = array(0, $idCur);
        return $this->save($sql, $array);
    }

    public function getCurso($idCur) // Trae el curso que se quiere editar.
    {
        $sql = "SELECT * FROM tblcurso WHERE idcurso = $idCur";
        return $this->select($sql);
    }

    public function modificar($nombre, $descripcion, $precio, $video, $destino, $tematica, $idcurso) // Actualiza un curso 
    {
        $sql = "UPDATE tblcurso SET nombre=?, descripcion=?, precio=?, video=?, imagen=?, idtematica=? WHERE idcurso = ? ";
        $array = array($nombre, $descripcion, $precio, $video, $destino, $tematica, $idcurso);
        return $this->save($sql, $array);
        
    }
}