<?php

require_once '../models/UsuariosModel.php';

$usuarios = new Usuarios();

$rspta = $usuarios->listar_usuarios();

$data = [];

while($item = $rspta->fetch(PDO::FETCH_OBJ)) {

    $data[] = [
        'id' => $item->id,
        'nombre' => $item->nombre,
        'apellido' => $item->apellido,
        'edad' => $item->edad,
        'genero' => $item->genero,
        'email' => $item->email,
        'celular' => $item->celular,
        'cargo' => $item->cargo,
        'habilitado' => $item->habilitado
    ];

}

echo json_encode($data);

?>