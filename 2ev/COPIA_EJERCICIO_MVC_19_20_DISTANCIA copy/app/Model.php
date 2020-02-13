<?php
include_once('Config.php');

class Model extends PDO
{

    protected $conexion;

    public function __construct()
    {

        $this->conexion = new PDO('mysql:host=' . Config::$mvc_bd_hostname . ';dbname=' . Config::$mvc_bd_nombre . '', Config::$mvc_bd_usuario, Config::$mvc_bd_clave);
        // Realiza el enlace con la BD en utf-8
        $this->conexion->exec("set names utf8");
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }



    public function dameAlimentos() //consulta sin parametrizar
    {

        $consulta = "SELECT * FROM alimentos ORDER BY energia DESC";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll();
    }

    public function buscarAlimentosPorNombre($nombre)
    {

        $consulta = "SELECT * FROM alimentos WHERE nombre LIKE :nombre ORDER BY energia DESC";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombre', $nombre);
        $result->execute();
        return $result->fetchAll();
    }

    public function buscarAlimentosPorEnergia($energia)
    {
        try {
            $consulta = "SELECT * FROM alimentos WHERE energia LIKE :energia ORDER BY nombre DESC";
            $result = $this->conexion->prepare($consulta);
            $result->bindParam(':energia', $energia);
            $result->execute();
            return $result->fetchAll();
        } catch (PDOException $e) {
            echo "<p>Error: " . $e->getMessage();
        }
    }

    public function dameAlimento($id)
    {

        $consulta = "SELECT * FROM alimentos WHERE id=:id";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id', $id);
        $result->execute();
        return $result->fetch();
    }


    public function insertarAlimento(array $params)
    {
        $consulta = "INSERT INTO alimentos (nombre, energia, proteina, hidratocarbono, fibra, grasatotal) VALUES (?, ?, ?, ?, ?, ?)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $params['nombre']);
        $result->bindParam(2, $params['energia']);
        $result->bindParam(3, $params['proteina']);
        $result->bindParam(4, $params['hc']);
        $result->bindParam(5, $params['fibra']);
        $result->bindParam(6, $params['grasa']);
        $result->execute();

        return $result;
    }

    //funcion para insertar nuevos usuarios
    function InsertUser(array $params)
    {

        $consulta = "INSERT INTO users (user, pass, nivel, email, ciudad) VALUES (:user, :pass, 1, :email,:ciudad)"; //por defecto los usuarios registrados son de nivel 1
        $insert = $this->conexion->prepare($consulta);
        $insert->bindParam(':user', $params['user']);
        $insert->bindParam(':pass', $params['password']);
        $insert->bindParam('email', $params['email']);
        $insert->bindParam('ciudad', $params['ciudad']);
        $insert->execute();
        return $insert;
    }

    //devuelve el usuario logueado si existe
    function SelectUser(array $params)
    {
        $consulta = "SELECT * FROM users WHERE user=:user AND pass=:pass";

        $select = $this->conexion->prepare($consulta);
        $select->bindParam(':user', $params['user']);
        $select->bindParam(':pass', $params['password']);
        $select->execute();
        $registro = $select->fetch();
        return $registro;
    }
}
