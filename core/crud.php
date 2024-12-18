<?php
require_once("conexion.php");
class Crud extends Conexion
{
    private $pdo;
    public function __construct(
        public string $tabla

    ) {
        parent::__construct();
        $this->pdo = $this->conectar();
    }
    public function consultaUsuarios()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM {$this->tabla}");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $mensaje) {
            $mensaje->getMessage();
        }
    }

    public function consultaUsuario(int $id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM {$this->tabla} WHERE id=?");
            $stm->execute([$id]);
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $mensaje) {
            $mensaje->getMessage();
        }
    }
 ##
    public function eliminar(int $id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM {$this->tabla} WHERE id=?");
            $stm->execute([$id]);
            $user = $stm->fetch(PDO::FETCH_OBJ);
            if (isset($user)) {
                $borrar = $this->pdo->prepare("DELETE FROM {$this->tabla} WHERE id=?");
                $borrar->execute([$id]);
                echo "El usuario  {$user->nombre} ha sido eliminado";
            }
        } catch (PDOException $mensaje) {
            $mensaje->getMessage();
        }
    }

    public function crearUsuario($columnas,$marcadores,$datos){
        try{
            $stm = $this->pdo->prepare("SELECT * FROM {$this->tabla} WHERE correo=?");
            $stm->execute([$_REQUEST["correo"]]);
            $user = $stm->fetch(PDO::FETCH_OBJ);
            if (!isset($user)) {
                $create=$this->pdo->prepare("INSERT INTO {$this->tabla} {$columnas} VALUES ($marcadores)");
                $create->execute([$datos]);
            }
            
        }catch( PDOException $mensaje) {
            $mensaje->getMessage(); 
        }
    }

}
