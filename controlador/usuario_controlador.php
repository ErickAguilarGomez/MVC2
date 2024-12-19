<?php
require_once("modelo/usuario.php");

class UsuarioControlador extends Usuario{
    public function __construct(){
        parent::__construct();
    }

    public function indexUsuario(){
        require_once("vista/usuario.php");
    }

    public function mostrarUsuario(){
        if(isset($_REQUEST["id"])){
            $usuario=$this->consultaUsuario($_REQUEST["id"]);
        }else{
            $usuario=$this;
        }
        require_once("vista/usuario_formulario.php");
    }

    public function guardar(){
        $this->id=$_REQUEST["id"];
        $this->nombre=$_REQUEST["nombre"];
        $this->apellido=$_REQUEST["apellido"];
        $this->usuario=$_REQUEST["usuario"];
        $this->clave=$_REQUEST["clave"];
        
        $this->id>0?$this->actualizar():$this->insertar();
        header("location:index.php");
    }

    public function eliminarUser(){
        $id=$_REQUEST["id"];
        $this->remover($id);
        header("location:index.php");
    }

}


?>