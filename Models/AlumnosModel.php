<?php
class AlumnosModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function getAlumnos($estado)
    {
        $sql = "SELECT * FROM tblusuarios WHERE estado = $estado ";
        return $this->selectAll($sql);
    }

    public function registrar($nombre, $apellido, $correo, $clave) 
    {
        $sql = "INSERT INTO  tblusuarios (nombre, apellido, correo, clave) VALUES (?,?,?,?)";
        $array = array($nombre, $apellido, $correo, $clave);
        return $this->insertar($sql, $array);
        
    }

    public function verificarCorreo($correo)
    {
        $sql = "SELECT correo FROM tblusuarios WHERE correo = '$correo' AND estado = 1 ";
        return $this->select($sql);
    }

    public function eliminar($idUser)
    {
        $sql = "UPDATE tblusuarios SET estado = ? WHERE id = ? ";
        $array = array(0, $idUser);
        return $this->save($sql, $array);
    }

    public function getAlumno($idUser)
    {
        $sql = "SELECT * FROM tblusuarios WHERE id = $idUser";
        return $this->select($sql);
    }

    public function modificar($nombre, $apellido, $correo, $id) 
    {
        $sql = "UPDATE tblusuarios SET nombre=?, apellido=?, correo=? WHERE id = ? ";
        $array = array($nombre, $apellido, $correo, $id);
        return $this->save($sql, $array);
        
    }

    
    
}
 
?>