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



    public function dameAlimentos()
    {

        $consulta = "select * from alimentos order by energia desc";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll();
    }

    public function buscarAlimentosPorNombre($nombre)
    {

        $consulta = "select * from alimentos where nombre like :nombre order by energia desc";

        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombre', $nombre);
        $result->execute();

        return $result->fetchAll();
    }

    public function buscarAlimentosPorEnergia($energia)
    {
        try {
            $consulta = "select * from alimentos where energia like :energia order by nombre desc";

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

        $consulta = "select * from alimentos where id=:id";

        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id', $id);
        $result->execute();
        return $result->fetch();
    }


    public function insertarAlimento(array $params)
    {
        $consulta = "insert into alimentos (nombre, energia, proteina, hidratocarbono, fibra, grasatotal) values (?, ?, ?, ?, ?, ?)";
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
    function InsertUser($user, $pass, $email, $ciudad)
    {

        $consulta = "INSERT INTO users (user, pass, nivel, email, ciudad) VALUES (:user, :pass, 1, :email,:ciudad)";
        $insert = $this->conexion->prepare($consulta);
        $insert->bindParam(':user', $user);
        $insert->bindParam(':pass', $pass);
        $insert->bindParam('email', $email);
        $insert->bindParam('ciudad', $ciudad);
        $insert->execute();
        return $insert;
    }

    //devuelve el usuario logueado si existe
    function SelectUser($user, $pass)
    {
        $consulta = "SELECT * FROM users WHERE user=:user AND pass=:pass";

        $select = $this->conexion->prepare($consulta);
        $select->bindParam(':user', $user);
        $select->bindParam(':pass', $pass);
        $select->execute();
        $registro = $select->fetch();
        return $registro;
    }
}
