<?php

require_once '../connect/connection.php';

class Usuarios extends Connection {

    public function __construct() {
        parent::__construct();
    }

    // QUERY PARA LISTAR LOS USUARIOS
    public function listar_usuarios() {

        $res = $this->con->prepare('SELECT * FROM usuarios');
        $res->execute();
        return $res;

    }

    // QUERY PARA MOSTRAR UN USUARIO
    public function mostrar_usuario($id) {

        $res = $this->con->prepare('SELECT * FROM usuarios WHERE id = :id;');
        $res->bindParam(':id', $id);
        $res->execute();
        return $res;

    }

    // QUERY PARA INSERTAR UN USUARIO
    public function insertar_usuario($nombre, $apellido, $edad, $genero, $email, $celular, $cargo, $habilitado) {

        $res = $this->con->prepare('INSERT INTO usuarios(nombre, apellido, edad, genero, email, celular, cargo, habilitado) VALUES(:nombre, :apellido, :edad, :genero, :email, :celular, :cargo, :habilitado);');
        $res->bindParam(':nombre', $nombre);
        $res->bindParam(':apellido', $apellido);
        $res->bindParam(':edad', $edad);
        $res->bindParam(':genero', $genero);
        $res->bindParam(':email', $email);
        $res->bindParam(':celular', $celular);
        $res->bindParam(':cargo', $cargo);
        $res->bindParam(':habilitado', $habilitado);
        $res->execute();
        return $res;

    }

    // QUERY PARA ACTUALIZAR UN USUARIO
    public function actualizar_usuario($id, $nombre, $apellido, $edad, $genero, $email, $celular, $cargo, $habilitado) {

        $res = $this->con->prepare('UPDATE usuarios SET nombre = :nombre, apellido = :apellido, edad = :edad, genero = :genero, email = :email, celular = :celular, cargo = :cargo, habilitado = :habilitado WHERE id = :id;');
        $res->bindParam(':nombre', $nombre);
        $res->bindParam(':apellido', $apellido);
        $res->bindParam(':edad', $edad);
        $res->bindParam(':genero', $genero);
        $res->bindParam(':email', $email);
        $res->bindParam(':celular', $celular);
        $res->bindParam(':cargo', $cargo);
        $res->bindParam(':habilitado', $habilitado);
        $res->bindParam('id', $id);
        $res->execute();
        return $res;

    }

    //QUERY PARA ELIMINAR UN USUARIO
    public function eliminar_usuario($id) {

        $res = $this->con->prepare('DELETE FROM usuarios WHERE id = :id;');
        $res->bindParam(':id', $id);
        $res->execute();
        return $res;

    }

}

?>