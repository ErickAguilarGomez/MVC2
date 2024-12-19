<?php

require_once("core/crud.php");
class Usuario extends Crud
{
    public function __construct(
        public int $id,
        public string $nombre = "",
        public string $apellido = "",
        public string $usuario = "",
        public string $clave = ""
    ) {
        parent::__construct("usuario");
    }

    public function insertar()
    {
        $this->crearUsuario("id,nombre,apellido,usuario,clave", "?,?,?,?,?", [$this->id, $this->nombre, $this->apellido, $this->usuario, $this->clave]);
    }

    public function actualizar()
    {
        $this->updateUser("id=?,nombre=?,apellido=?,usuario=?,clave=?",  [$this->id, $this->nombre, $this->apellido, $this->usuario, $this->clave]);
    }

    public function remover() {
        $this->eliminar($this->id);
    }


    
}
