<?php
require_once PROJECT_ROOT_PATH . "/clases/Database.php";

class Usuario extends Database
{
    public function getUsers($limit)
    {
        return $this->select("SELECT * FROM users ORDER BY user_id ASC");
    }
    
    public function obtenerUsuarios(){
            $sql= "SELECT * FROM users ORDER BY user_id";
    }
}
