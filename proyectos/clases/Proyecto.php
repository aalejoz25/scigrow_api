<?php
include_once "../../clases/Database.php";

class Proyecto extends Database

{
    public function createProject($user_id, $projectName, $projectDes)
    {
        $sql = "CALL CREARPROYECTO('$user_id','$projectName','$projectDes')";
        $result = $this->select($sql);
        return $result;
    }

}