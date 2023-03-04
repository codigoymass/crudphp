<?php

require_once '../models/UsuariosModel.php';

$rspta = (new Usuarios)->mostrar_usuario($_GET['id']);

$data = $rspta->fetch(PDO::FETCH_OBJ);

echo json_encode($data);

?>