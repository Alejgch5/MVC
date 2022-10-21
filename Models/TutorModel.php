<?php
class TutorModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuario($correo)
    {
        $sql = "SELECT * FROM tbltutor WHERE correo = '$correo'";
        return $this->select($sql);
    }

    
  
    
}
 
?>