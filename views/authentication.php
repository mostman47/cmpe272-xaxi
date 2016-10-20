<?php
$ADMIN_NAME = "admin";
$HASH_SALT = "Hello";
extract($_POST);
if (!$username || !$password) {
    header('Content-Type: application/json');
    print_r('{"status": false,"message":"username or password cannot be empty"}');
    die();
}

if ($username != $ADMIN_NAME) {
    header('Content-Type: application/json');
    print_r('{"status": false,"message":"username or password is incorrect"}');
    die();
}

/*check admin*/

$string = file_get_contents("../assets/users.json");
$json = json_decode($string, true);
$arrayUser = array();
foreach ($json['users'] as $value) {
    if ($value['name'] == $ADMIN_NAME) {
        $adminPassword = $value['password'];
    }
    array_push($arrayUser, $value['name']);
}

if (isset($adminPassword) && $adminPassword == crypt($password, $HASH_SALT)) {

    header('Content-Type: application/json');
    print_r('{"status": true,"message":"successful login!","users":["' . implode("\",\"", $arrayUser) . '"]}');
}else{
    header('Content-Type: application/json');
    print_r('{"status": false,"message":"username or password is incorrect"}');
}
?>