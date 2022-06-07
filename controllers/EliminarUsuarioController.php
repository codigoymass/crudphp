<?php

require_once '../models/UsuariosModel.php';

$usuarios = new Usuarios();

$rspta = $usuarios->eliminar_usuario($_GET['id']);

echo ($rspta) ? "Se ha eliminado exitosamente el usuario." : "Hubo un error al tratar de eliminar el usuario.";

?>