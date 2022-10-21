<?php
class PrincipalModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function getTematicas()
    {
        $sql = "SELECT * FROM tbltematica WHERE estado = 1";
        return $this-> selectAll($sql);
    }
    public function getCursos($desde , $porPagina )
    {
        $sql = "SELECT * FROM tblcurso LIMIT $desde, $porPagina";
        return $this-> selectAll($sql);
    }

    public function getDetalle($idcurso)
    {
        $sql = "SELECT  p.*, t.tematica FROM tblcurso p INNER JOIN tbltematica t ON t.idtematica = p.idtematica WHERE p.idcurso = $idcurso";
        return $this-> select($sql);
    }

    public function getCursosTematica($idtematica, $desde, $porPagina )
    {
        $sql = "SELECT * FROM tblcurso WHERE idtematica = $idtematica LIMIT $desde, $porPagina";
        return $this-> selectAll($sql);
    }

    public function getTotalCursos()
    {
        $sql = "SELECT COUNT(*) AS total FROM tblcurso ";
        return $this-> select($sql);
    }

    public function getTotalCursosTe($idtematica)
    {
        $sql = "SELECT COUNT(*) AS total FROM tblcurso WHERE idtematica = $idtematica ";
        return $this-> select($sql);
    }

    public function getAleatorios($idtematica, $idcurso)
    {
        $sql = "SELECT * FROM tblcurso WHERE idtematica = $idtematica AND idtematica != idcurso ORDER BY RAND()  LIMIT 20";
        return $this-> selectAll($sql);

    }
    // modelo listas de deseos
    public function getListaDeseo($idcurso)
    {
        $sql = "SELECT * FROM tblcurso WHERE idcurso = $idcurso";
        return $this-> select($sql);

    }

    



    

    
}
 
?>