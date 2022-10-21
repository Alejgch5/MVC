<?php
class CursosModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function getProductos($estado)
    {
        $sql = "SELECT * FROM tblcurso WHERE estado = $estado";
        return $this->selectAll($sql);
    }
    
    public function getTematicas()
    {
        $sql = "SELECT * FROM tbltematica WHERE estado = 1";
        return $this->selectAll($sql);
    }

    public function registrar($nombre, $descripcion, $precio, $video, $imagen, $tematica) 
    {
        $sql = "INSERT INTO  tblcurso (nombre, descripcion, precio, video, imagen, idtematica) VALUES (?,?,?,?,?,?)";
        $array = array($nombre, $descripcion, $precio, $video, $imagen, $tematica);
        return $this->insertar($sql, $array);
        
    }

    public function eliminar($idCur)
    {
        $sql = "UPDATE tblcurso SET estado = ? WHERE idcurso = ? ";
        $array = array(0, $idCur);
        return $this->save($sql, $array);
    }

    public function getCurso($idCur)
    {
        $sql = "SELECT * FROM tblcurso WHERE idcurso = $idCur";
        return $this->select($sql);
    }

    public function modificar($nombre, $descripcion, $precio, $video, $destino, $tematica, $idcurso) 
    {
        $sql = "UPDATE tblcurso SET nombre=?, descripcion=?, precio=?, video=?, imagen=?, idtematica=? WHERE idcurso = ? ";
        $array = array($nombre, $descripcion, $precio, $video, $destino, $tematica, $idcurso);
        return $this->save($sql, $array);
        
    }
}