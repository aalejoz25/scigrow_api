<?php
include_once ('../../conf/cors.php');

$request_body = file_get_contents('php://input');
$data = json_decode($request_body);
$tipo = $data->{'tip'};

if ($tipo == 'registrarUsuario') {
    include_once('../clases/Usuario.php');
    $userTypeId = $data->{'userType'};
    $userName = $data->{'userName'};
    $password = $data->{'password'};
    $email = $data->{'email'};
    $first_name = $data->{'firstName'};
    $lastName = $data->{'lastName'};
    $birthDate = $data->{'birthDate'};
    $password = md5($password);
    if ($userTypeId == 1) {
        echo json_encode(['No puede crear otro usuario administrador']);
    } else {
        $u = new Usuario();
        $response = $u->crearUsuario($userTypeId, $userName, $password, $email, $first_name, $lastName, $birthDate);
        $response = json_encode(array('addeduser'=>$response));
        echo $response;
    }
} elseif ($tipo == 'borrarUsuario') {
    include_once('../clases/Usuario.php');
    $userName = $data->{'userName'};
    $u = new Usuario();
    if ($userName == "admin") {
        echo json_encode(['No puede borrar el usuario administrador']);
    } else {
        $response = $u->borrarUsuario($userName);
        echo json_encode(array("deleted"=>$response));
    }


}