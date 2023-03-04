<?php

require_once '../models/UsuariosModel.php';

$id = isset($_POST['id']) ? $_POST['id'] : '';
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$edad = isset($_POST['edad']) ? $_POST['edad'] : '';
$genero = isset($_POST['genero']) ? $_POST['genero'] : '';
$celular = isset($_POST['celular']) ? $_POST['celular'] : '';
$cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';
$habilitado = isset($_POST['habilitado']) ? $_POST['habilitado'] : '';

/**
 * SI EL ID ESTA VACÍO, INSERTAMOS, DE LO CONTRARIO ACTUALIZAMOS
 */
if($id == '') {
    $res = (new Usuarios)->insertar_usuario($nombre, $apellido, $edad, $genero, $email, $celular, $cargo, $habilitado); 
    echo ($res) ? "Registro guardado correctamente" : "Hubo un problema al guardar el registro";
} else {
    $res = (new Usuarios)->actualizar_usuario($id, $nombre, $apellido, $edad, $genero, $email, $celular, $cargo, $habilitado);
    echo ($res) ? "Registro actualizado correctamente" : "Hubo un problema al actualizar el registro";
}

?>