<?php

class Connection {

    public $con;

    /**
     * CONEXIÓN A LA BASE DE DATOS
     */
    public function __construct() {
        $this->con = new PDO("mysql:host=localhost;port=3306;dbname=base_datos", "root", "");
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

}

?>