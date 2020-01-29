<?php
include_once('Config.php');

class Model extends PDO
{

    protected $conexion;

    public function __construct()
    {
        try {

            $this->conexion = new PDO('mysql:host=' . Config::$mvc_bd_hostname . ';dbname=' . Config::$mvc_bd_nombre . '', Config::$mvc_bd_usuario, Config::$mvc_bd_clave);
            // Realiza el enlace con la BD en utf-8
            $this->conexion->exec("set names utf8");
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "<p>Error: No puede conectarse con la base de datos.</p>\n";
            echo "<p>Error: " . $e->getMessage();
        }
    }



    public function dameAlimentos()
    {
        try {

            $consulta = "select * from alimentos order by energia desc";
            $result = $this->conexion->query($consulta);
            return $result->fetchAll();
        } catch (PDOException $e) {

            echo "<p>Error: " . $e->getMessage();
        }
    }

    public function buscarAlimentosPorNombre($nombre)
    {
        try {
            $consulta = "select * from alimentos where nombre like :nombre order by energia desc";

            $result = $this->conexion->prepare($consulta);
            $result->bindParam(':nombre', $nombre);
            $result->execute();

            return $result->fetchAll();
        } catch (PDOException $e) {

            echo "<p>Error: " . $e->getMessage();
        }
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
        try {
            $consulta = "select * from alimentos where id=:id";

            $result = $this->conexion->prepare($consulta);
            $result->bindParam(':id', $id);
            $result->execute();
            return $result->fetch();
        } catch (PDOException $e) {

            echo "<p>Error: " . $e->getMessage();
        }
    }


    public function insertarAlimento($n, $e, $p, $hc, $f, $g)
    {
        $consulta = "insert into alimentos (nombre, energia, proteina, hidratocarbono, fibra, grasatotal) values (?, ?, ?, ?, ?, ?)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $n);
        $result->bindParam(2, $e);
        $result->bindParam(3, $p);
        $result->bindParam(4, $hc);
        $result->bindParam(5, $f);
        $result->bindParam(6, $g);
        $result->execute();

        return $result;
    }

    //funcion para insertar nuevos usuarios
    function InsertUser($user, $password)
    {

        $consulta = "INSERT INTO usuarios (nombre, password) VALUES (:user, :pass)";
        $insert = $this->conexion->prepare($consulta);
        $insert->bindParam(':user', $user);
        $insert->bindParam(':pass', $password);


        $insert->execute();
        return $insert;
    }


    function SelectUser($user, $password)
    {
        $consulta = "SELECT * FROM usuarios WHERE nombre=:user";

        $select = $this->conexion->prepare($consulta);
        $select->bindParam(':user', $user);
        $select->execute();
        $registro = $select->fetch();
        return $registro;
    }
}
