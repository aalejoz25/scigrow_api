<?php
include_once ('../../conf/cors.php');
$request_body = file_get_contents('php://input');
$data = json_decode($request_body);

$tipo = $data->{'tip'};

if ($tipo == 'getUsuarios') {
    include_once('../clases/Usuario.php');
    $u = new Usuario();
    echo json_encode($u->obtenerUsuarios());
}

if ($tipo == 'getTipoUsuarios') {
    include_once('../clases/Usuario.php');
    $u = new Usuario();
    echo json_encode($u->obtenerTiposUsuarios());
}


