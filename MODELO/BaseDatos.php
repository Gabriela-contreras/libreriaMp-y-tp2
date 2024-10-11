<?php

class BaseDatos extends PDO
{
    private $host = "localhost";
    private $usuario = "root";
    private $password = "";
    private $nombreBaseDatos = "libreriaMp";
    private $conexion;

    public function __construct()
    {
        try {
            $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->nombreBaseDatos", $this->usuario, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function ejecutarConsulta($consulta)
    {
        return $this->conexion->query($consulta);
    }

    public function ejecutarConsultaPreparada($consulta, $parametros)
    {
        $stmt = $this->conexion->prepare($consulta);
        $stmt->execute($parametros);
        return $stmt;
    }

    public function cerrarConexion()
    {
        $this->conexion = null;
    }

    public function __destruct()
    {
        $this->cerrarConexion();
    }

    public function getConexion()
    {
        return $this->conexion;
    }

    
}