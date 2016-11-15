<?php
$HASH_SALT = "Hello";
function connectDataBase()
{
    $database = mysql_connect('localhost:3306', 'root', 'admin');
    return mysql_select_db('team', $database);
}

function getAllUser()
{

    $query = 'SELECT * FROM users ORDER BY id DESC';

    return selectQuery($query);

}

function getAllProduct()
{

    $query = 'SELECT * FROM products';

    return selectQuery($query);

}

function getProductById($id)
{

    $query = 'SELECT * FROM products WHERE id = ' . $id;

    return selectQuery($query);

}

function getProductByArrayId($array)
{
    $array = implode(",", $array);
    $query = 'SELECT * FROM products WHERE id IN (' . $array . ')';

    return selectQuery($query);

}



function searchUser($type, $value)
{
    $query = "SELECT * FROM users WHERE";
    if (!$type || !$value) {
        return "fail";
    }

    switch ($type) {
        case "username":
            $query .= " username = '" . $value . "'";
            break;
    }

    return selectQuery($query);
}

function selectQuery($query)
{
    $db_selected = connectDataBase();

    $result = array();

    if (!$db_selected) {
        die("Could not connect to database");
    } else {
        $result = mysql_query($query);
        if (!$result) {
            die('Invalid query: ' . mysql_error());
        } else {
            return $result;
        }
    }
}

function deleteUser()
{
    print_r($_POST);
}

if (isset($_POST['createUser'])) {
    createUser();
}

?>