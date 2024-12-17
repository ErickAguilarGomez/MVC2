<?php
require_once("core/crud.php");

$usuarios=new Crud("usuario");
$usuarioEliminado=$usuarios->eliminar(1);
?>