<?php
include_once ('../conf/cors.php');
include_once('../clases/Login.php');

$request_body = file_get_contents('php://input');
$data = json_decode($request_body);

$user = trim($data->{'username'});
$password = trim($data->{'password'});
if ($user != null and $password != null) {
    $user = addslashes(trim($user));
    $password = addslashes(trim($password));
    settype($user, 'string');
    settype($password, 'string');

    $Login = new Login($user, $password);
    $data = $Login->data;

    if ($Login->isUser($data)) {
        $response= array('isLogged'=>'TRUE','user_type'=>$data[0]['user_type_id']);
        echo json_encode($response);
    } else {
        $response= array('isLogged'=>'FALSE');
        echo json_encode($response);
    }
}

