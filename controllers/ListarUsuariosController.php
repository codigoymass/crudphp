<?php

require_once '../models/UsuariosModel.php';

$rspta = (new Usuarios)->listar_usuarios();

$data = [];

while($item = $rspta->fetch(PDO::FETCH_OBJ)) {
    $data[] = $item;
}

echo json_encode($data);

?>