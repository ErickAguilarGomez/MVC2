<?php
require_once("../modelo/usuario.php");

class UsuarioControlador extends Usuario{
    public function __construct(){
        parent::__construct();
    }

    public function indexUsuario(){
        require_once("../vista/usuario.php");
    }

    public function mostrarUsuario(){
        $id=$_REQUEST["id"];
        if(isset($id)){
            $usuario=$this->consultaUsuario($id);
        }
    }

}


?>