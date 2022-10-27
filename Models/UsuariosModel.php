<?php
class UsuariosModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function registroDirecto($nombre,$apellido,$correo,$clave,$doc,$token,$genero,$rol=2) //el rol por defecto es 2 (usuario). a menos que se haga un registro tutor, en lo cual se recibe una variable con el dato del rol 1 (admin).
    {
        $sql = "INSERT INTO tblusuarios (nombre, apellido, correo, clave, doc, token, idgenero, idrol) VALUES (?,?,?,?,?,?,?,?)";
        $datos = array($nombre, $apellido, $correo, $clave, $doc, $token, $genero, $rol);

        //inserción con el tipo de genero
        // $genero = 1;
        // $sql = "INSERT INTO tblusuarios (nombre, apellido, correo, clave, doc, token, idrol, idgenero) VALUES (?,?,?,?,?,?,?,?)";
        // $datos = array($nombre, $apellido, $correo, $clave, $doc, $token, $rol, $genero);

        $data = $this->insertar($sql, $datos);
        if ($data > 0){
            $res = $data;

        }else{
            $res = 0;

        }
        return $res;

    }

    public function getToken($token)
    {
        $sql = "SELECT * FROM tblusuarios WHERE token = '$token' ";
        return $this->select($sql);
    }

    public function actualizarVerify($id)
    {
        $sql = "UPDATE tblusuarios SET token=?, verify=? WHERE id=? ";
        $datos = array(null, 1, $id);
        $data = $this->save($sql, $datos);
        if ($data == 1){
            $res = $data;

        }else{
            $res = 0;

        }
        return $res;
    }

    public function getVerificar($correo)
    {
        $sql = "SELECT * FROM tblusuarios WHERE correo = '$correo' ";
        return $this->select($sql);
    }

    public function registrarPedido($id_transaccion, $monto, $estado, $fecha, $email, $nombre, $apellido, $direccion, $ciudad, $email_user)
    {
        $sql = "INSERT INTO pedidos ( id_transaccion, monto, estado, fecha, email, nombre, apellido, direccion, ciudad, email_user) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $datos = array($id_transaccion, $monto, $estado, $fecha, $email, $nombre, $apellido, $direccion, $ciudad, $email_user);
        $data = $this->insertar($sql, $datos);
        if ($data > 0){
            $res = $data;

        }else{
            $res = 0;

        }
        return $res;

    }

    public function getDetalle($idcurso)
    {
        $sql = "SELECT * FROM tblcurso WHERE idcurso = $idcurso";
        return $this->select($sql);
    }

    public function registrarDetalle($curso, $precio, $id_pedido)
    {
        $sql = "INSERT INTO detalle_pedidos ( curso, precio, id_pedido) VALUES (?,?,?)";
        $datos = array($curso, $precio, $id_pedido);
        $data = $this->insertar($sql, $datos);
        if ($data > 0){
            $res = $data;

        }else{
            $res = 0;

        }
        return $res;


    }

    public function getPedidos($proceso)
    {
        $sql = "SELECT * FROM pedidos WHERE proceso = $proceso";
        return $this-> selectAll($sql);
    }

    //resumen de compra

    public function verPedido($idpedido)
    {
        $sql = "SELECT d.* FROM pedidos p INNER JOIN detalle_pedidos d ON p.id = d.id_pedido WHERE p.id = $idpedido";
        return $this-> selectAll($sql);
    }
    // public function getGenero() // trae los nombres de los generos
    // {
    //     $sql = "SELECT nombre FROM tblgenero;";
    //     return $this-> selectAll($sql);
    // }

    
}
 
?>