<?php 
class DashboardModel extends Query{ // Contiene las consultas que se requieren en la vista admin
 
    public function __construct()
    {
        parent::__construct();
    }

    public function getThematic() // Consulta todos los registros de tbltematica
    {
        $query = "SELECT * FROM tbltematica";
        $stmt = $this->selectAll($query);

        return $stmt;
    }

    public function validateThematic($params = [], $id = null) // valida si el nombre de la temática ya existe y devuelve el resultado
    {
        // Se agregan los datos del formulario al array
        $datos = $params;

        $query = "SELECT * FROM tbltematica WHERE tematica LIKE '%".$datos['tematica']."%'";
        // $query = "SELECT * FROM tbltematica WHERE tematica = '".$datos['tematica']."'"; 
        //Sirve para buscar una coincidencia exacta (la línea anterior)
        
        if(!empty($id))
        {
            $query = "SELECT * FROM tbltematica WHERE tematica LIKE '%".$datos['tematica']."%' AND NOT idtematica=".$id;
        }

        $stmt = $this->selectAll($query);

        return $stmt;
    }
    public function insertThematic($params = []) // Inserta un registro en la tbltematica
    {
        // Se agregan los datos del formulario al array
        $datos = [];

        if(!empty($params['tematica']))
        {
            $datos[':tematica'] = $params['tematica'];
        }

        $stmt = $this->save(
            "INSERT INTO tbltematica (tematica) VALUES (:tematica)",$datos
        );
       
        return $stmt;
    }
    public function updateThematic($params = []) // Actualiza un registro en la tbltematica
    {
        // Se agregan los datos del formulario al array
        $datos = [];

        if(!empty($params['tematica']))
        {
            $datos[':tematica'] = $params['tematica'];
        }

        if(!empty($params['idtematica']))
        {
            $datos[':idtematica'] = $params['idtematica'];
        }

        $stmt = $this->save(
            "UPDATE tbltematica SET tematica=:tematica WHERE idtematica=:idtematica",$datos
        );
       
        return $stmt;
    }
    public function deleteThematic($id) // Borra un registro de la tbltematica
    {
        $datos = [
            ':idtematica' => $id
        ];
        $stmt = $this->save(
            "DELETE FROM tbltematica WHERE idtematica = :idtematica",$datos
        );
        
        return $stmt;
    }
    public function getGender() // Consulta todos los registros de tblgenero
    {
        $query = "SELECT * FROM tblgenero";
        $stmt = $this->selectAll($query);

        return $stmt;
    }
    public function getGenderNumber() // Consulta cantidad de generos
    {
        $query = "SELECT tblgenero.nombre as 'Genero', COUNT(tblusuarios.idgenero) as 'cantidad_genero' FROM tblusuarios INNER JOIN tblgenero ON tblusuarios.idgenero = tblgenero.codigo GROUP BY tblgenero.nombre;";

        $stmt = $this->selectAll($query);

        return $stmt;
    }
    public function getTotalGender() // Consulta el total de personas generos
    {
        $query = "SELECT COUNT(tblusuarios.idgenero) as total_personas
        FROM tblusuarios INNER JOIN tblgenero ON tblusuarios.idgenero = tblgenero.codigo;";

        $stmt = $this->selectAll($query);

        return $stmt;
    }
    public function getBestTeacher() // Consulta que trae los mejores 10 tutores
    {
        $query = "SELECT CONCAT(tblusuarios.nombre , ' ' , tblusuarios.apellido) AS 'nombre_tutor', AVG(tblcalificacioncurso.calificacion) AS 'calificacion' FROM tblcalificacioncurso  INNER JOIN tblcurso ON tblcalificacioncurso.idcurso = tblcurso.idcurso INNER JOIN tblusuarios ON tblusuarios.id = tblcurso.idtutor GROUP BY tblusuarios.id ORDER BY AVG(tblcalificacioncurso.calificacion) DESC LIMIT 10;";

        $stmt = $this->selectAll($query);

        return $stmt;
    }
    public function getTotalSales() // Consulta el valor Total vendido de la aplicación
    {
        $query = "SELECT SUM(pedidos.monto) as 'total_vendido' FROM pedidos;";

        $stmt = $this->select($query);

        return $stmt;
    }
    public function getHighestIncome() // Consulta Tutor con mayor ingresos
    {
        $query = "SELECT CONCAT(tblusuarios.nombre, ' ' , tblusuarios.apellido) AS 'nombre_tutor', SUM(tblfactura.valor) AS 'venta_total', COUNT(tblfactura.numero) AS 'cursos_Vendidos' FROM tblfactura  INNER JOIN tblcurso ON tblfactura.idcurso = tblcurso.idcurso INNER JOIN 	tblusuarios ON tblcurso.idtutor = tblusuarios.docid GROUP BY tblusuarios.docid ORDER BY SUM(tblfactura.valor) DESC;";

        $stmt = $this->selectAll($query);

        return $stmt;
    }
    public function getMonthlySales() // Consulta las ventas por mes (es necesario que la ConexionAdmin a la BD se haga en el idioma español con "SET lc_time_names = 'es_ES';" para que los meses salgan en el idioma español).
    {
        $query = "SELECT SUM(pedidos.monto) AS 'total_ventas', monthname(pedidos.fecha) AS 'mes', month(pedidos.fecha) AS 'orden_mes', year(now()) FROM pedidos WHERE year(pedidos.fecha) = YEAR(now()) GROUP BY monthname(pedidos.fecha) ORDER By month(pedidos.fecha) asc;";

        $stmt = $this->selectAll($query);

        return $stmt;
    }
    public function getTotalCourses() // Consulta cuántos cursos hay en la plataforma
    {
        $query = "SELECT count(tblcurso.idcurso) as 'cantidad_cursos' FROM tblcurso;";

        $stmt = $this->selectAll($query);

        return $stmt;
    }
    public function getAverageSales() // Consulta Valor Promedio por factura
    {
        $query = "SELECT AVG(pedidos.monto) as 'promedio_ventas' FROM pedidos;";

        $stmt = $this->selectAll($query);

        return $stmt;
    }
}

?>