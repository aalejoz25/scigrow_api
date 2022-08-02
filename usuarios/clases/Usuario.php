<?php
include_once "../../clases/Database.php";

class Usuario extends Database
{
    public function crearUsuario($userTypeId, $userName, $password, $email, $first_name, $last_name, $birthDate)
    {
        $sql = "CALL CREARUSUARIO('$userTypeId','$userName','$password','$email','$first_name','$last_name','$birthDate')";
        $result = $this->select($sql);
        return $result;
    }

    public function borrarUsuario($userName)
    {
        $sql = "CALL BORRARUSUARIO('$userName')";
        $result = $this->select($sql);
        return $result;
    }

    public function obtenerUsuarios()
    {
        $sql = "SELECT * FROM users";
        $result = $this->select($sql);
        return $result;
    }

    public function obtenerTiposUsuarios()
    {
        $sql = "SELECT * FROM user_type";
        $result = $this->select($sql);
        return $result;
    }
}
