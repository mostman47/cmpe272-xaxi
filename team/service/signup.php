<?php
include 'mysql.php';

function createUser()
{
    /*default value*/
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        print_r('{"status": false,"message":"username and password is required"}');
        die();
    }

    $search = searchUser("username", $_POST['username']);
    if (mysql_num_rows($search) > 0) {
        print_r('{"status": false,"message":"username is existed"}');
        die();
    }

    $pass = crypt($_POST['password'], "Hello");

    $query = "INSERT INTO users (username, password)VALUES ('"
        . $_POST['username'] . "','$pass')";
    $result = selectQuery($query);
    if ($result > 0) {
        print_r('{"status": true,"message":"user is created"}');
    }

}

createUser();
?>