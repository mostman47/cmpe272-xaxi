<?php

function connectDataBase()
{
    $database = mysql_connect('localhost:3306', 'root', 'admin');
    return mysql_select_db('xaxi', $database);
}

function getAllUser()
{
    $db_selected = connectDataBase();

    $query = 'SELECT * FROM users';

    $result = array();

    if (!$db_selected) {
        die("Could not connect to database");
    } else {
        $result = mysql_query($query);
        if (!$result) {
            die('Invalid query: ' . mysql_error());
        } else {
//            $result = mysql_fetch_assoc($result);
//            print_r("done");
//            while ($rows = mysql_fetch_assoc($result)) {
//                foreach ($rows as $key => $value) {
//                    echo $key . ' : ' . $value . "\n";
//                }
//            }
//            print_r(mysql_fetch_assoc($result));
//            return mysql_fetch_assoc($result);
        }
    }

    return $result;
}

function createUser()
{
    echo "createUser";
}

function deleteUser()
{

}

function search()
{

}
print_r($_POST);
if (isset($_POST['createUser'])) {
    createUser();
}

//mysql_free_result($result);
?>