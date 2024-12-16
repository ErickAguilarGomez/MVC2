<?php
require_once 'core/Conexion.php';

$con = new Conexion();
$pdo = $con->conectar();

if ($pdo) {
    echo "Conexión exitosa";
} else {
    echo "No se pudo conectar a la base de datos";
}
