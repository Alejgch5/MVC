<?php
class ConexionAdmin{ //Clase que se conecta a la BD en idioma español para consultas sql muy específicas.
    static public function ConectarAdmin(){
        $conexion = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
        //$conexion->exec("SET CHARACTER SET utf8");
        $conexion->exec("SET lc_time_names = 'es_ES'"); // aqui cambio el idioma de la bd a español

        return $conexion;
    }
}
