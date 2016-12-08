<?php
include 'mysql.php';

function login()
{
    /*default value*/
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        print_r('{"status": false,"message":"username and password is required"}');
        die();
    }

    $pass = crypt($_POST['password'], "Hello");
    $query = "SELECT * FROM users WHERE username = '"
        . $_POST['username'] . "' AND password = '$pass' ";
    $result = selectQuery($query);
    if (mysql_num_rows($result) > 0) {
        $rt = mysql_fetch_assoc($result);
        $rt['status'] = true;
        $rt['password'] = null;
        print_r(json_encode($rt));
    } else {
        print_r('{"status": false,"message":"username is not existed or password is incorrect"}');
    }

}

login();
?>