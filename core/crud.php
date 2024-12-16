<?php
require_once("conexion.php");
class Crud extends Conexion{
    private $pdo;
    public function __construct(
       public string $tabla

    ){
        parent::__construct("usuario");
        $this->pdo=$this->conectar();
    }


}



?>