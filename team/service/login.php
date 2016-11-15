<?php
include 'mysql.php';

function login()
{
    /*default value*/
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        print_r('{"status": false,"message":"username and password is required"}');
        die();
    }

    $pass = crypt($_POST['password'], $HASH_SALT);
    $query = "SELECT * FROM users WHERE username = '"
        . $_POST['username'] . "' AND password = '$pass' ";
    print_r($query);
    $result = selectQuery($query);
echo mysql_num_rows($result);
    if (mysql_num_rows($result) > 0) {
        print_r('{"status": true,"message":"logined"}');
    } else {
        print_r('{"status": false,"message":"username is not existed"}');
    }

}

login();
?>