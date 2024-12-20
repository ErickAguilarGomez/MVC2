<?php

class Conexion
{
    public function __construct(
        public string $host = "localhost",
        public string $dbName = "login",
        public string $charset = "utf8",
        public string $username = "root",
        public string $password = ""
    ) {}
##
    protected function conectar()
    {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbName;charset=$this->charset";
            $pdo = new PDO($dsn, $this->username, $this->password);
            return $pdo;
        } catch (PDOException $mensaje) {
            echo "Error al conectar a la base de datos:{$mensaje->getMessage()}";
            return null;
        }
    }
}
