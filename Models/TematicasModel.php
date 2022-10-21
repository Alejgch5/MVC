<?php
class TematicasModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function getTematicas($estado)
    {
        $sql = "SELECT * FROM tbltematica WHERE estado = $estado ";
        return $this->selectAll($sql);
    }

    public function registrar($tematica, $imagen) 
    {
        $sql = "INSERT INTO  tbltematica (tematica, imagen) VALUES (?,?)";
        $array = array($tematica, $imagen);
        return $this->insertar($sql, $array);
        
    }

    public function verificarTematica($tematica)
    {
        $sql = "SELECT tematica FROM tbltematica WHERE tematica = '$tematica' AND estado = 1 ";
        return $this->select($sql);
    }

    public function eliminar($idTe)
    {
        $sql = "UPDATE tbltematica SET estado = ? WHERE idtematica = ? ";
        $array = array(0, $idTe);
        return $this->save($sql, $array);
    }

    public function getTematica($idTe)
    {
        $sql = "SELECT * FROM tbltematica WHERE idtematica = $idTe";
        return $this->select($sql);
    }

    public function modificar($tematica, $imagen, $idtematica) 
    {
        $sql = "UPDATE tbltematica SET tematica=?, imagen=?WHERE idtematica = ? ";
        $array = array($tematica, $imagen, $idtematica);
        return $this->save($sql, $array);
        
    }
}