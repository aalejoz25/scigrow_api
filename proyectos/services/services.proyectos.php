<?php
include_once ('../../conf/cors.php');

$request_body = file_get_contents('php://input');
$data = json_decode($request_body);
$tipo = $data->{'tip'};


if ($tipo == "crearProyecto") {
    include_once('../clases/Proyecto.php');
    $userId = $data->{'userId'};
    $projectName = $data->{'projectName'};
    $pDescription = $data->{'description'};
    $p = new Proyecto();
    $response = $p->createProject($userId, $projectName, $pDescription);
    $response = json_encode(array('addedProject' => $response));
    echo $response;
}