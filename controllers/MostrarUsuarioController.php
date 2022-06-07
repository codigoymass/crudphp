<?php

require_once '../models/UsuariosModel.php';

$usuarios = new Usuarios();

$rspta = $usuarios->mostrar_usuario($_GET['id']);

$res = $rspta->fetch(PDO::FETCH_OBJ);

$data = [
    'id' => $res->id,
    'nombre' => $res->nombre,
    'apellido' => $res->apellido,
    'edad' => $res->edad,
    'genero' => $res->genero,
    'email' => $res->email,
    'celular' => $res->celular,
    'cargo' => $res->cargo,
    'habilitado' => $res->habilitado
];

echo json_encode($data);

?>