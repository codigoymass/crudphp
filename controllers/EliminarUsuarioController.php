<?php

require_once '../models/UsuariosModel.php';

$rspta = (new Usuarios)->eliminar_usuario($_GET['id']);

echo ($rspta) ? "Se ha eliminado exitosamente el usuario." : "Hubo un error al tratar de eliminar el usuario.";

?>