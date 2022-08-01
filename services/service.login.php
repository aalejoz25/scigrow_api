<?php
include_once('../clases/Login.php');

$user = trim($_POST['username']);
$password = trim($_POST['password']);
if ($user != null and $password != null) {
    $user = addslashes(trim($user));
    $password = addslashes(trim($password));
    settype($user, 'string');
    settype($password, 'string');

    $Login = new Login($user, $password);
    $data = $Login->data;

    if ($Login->isUser($data)) {
        echo 'TRUE';
    } else {
        echo 'FALSE';
    }
}

