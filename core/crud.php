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

    public function crearUsuario($columnas, $marcadores, $datos)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE usuario = ?");
            $stm->execute([$datos[3]]);
            $user = $stm->fetch(PDO::FETCH_OBJ);

            if (!$user) {
                $create = $this->pdo->prepare("INSERT INTO $this->tabla ($columnas) VALUES ($marcadores)");
                $create->execute($datos);
                echo "Usuario insertado exitosamente";
            } else {
                echo "El usuario ya existe";
            }
        } catch (PDOException $e) {
            echo "Error al insertar el usuario: " . $e->getMessage();
        }
    }

    public function updateUser(string $columnas, array $datos)
    {
        try {
            $stm = $this->pdo->prepare("UPDATE $this->tabla SET $columnas  WHERE id=$datos[0]");
            $stm->execute($datos);
            echo "Usuario $datos[1] actualizado correctamente";
        } catch (PDOException $mensaje) {
            $error = $mensaje->getMessage();
            echo $error;
        }
    }
}
