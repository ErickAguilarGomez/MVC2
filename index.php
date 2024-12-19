<?php
require_once("modelo/usuario.php");

$usuarios = new Usuario(
    id: 5,
    nombre: "carlos",
    apellido: "carlos",
    usuario: "mendoza",
    clave: "mendoza"
);

var_dump($usuarios->consultaUsuario(5));