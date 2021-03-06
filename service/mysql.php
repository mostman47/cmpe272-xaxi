<?php

function connectDataBase()
{
    $database = mysql_connect('localhost:3306', 'root', 'admin');
    return mysql_select_db('xaxi', $database);
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

function getReviewById($id)
{
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => 'http://myxaxi.net/team/service/export_review_id.php?site=xaxi&id=' . $id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_FOLLOWLOCATION => true
    ));

    $visits = curl_exec($ch);
    $visits = json_decode($visits,true);
    return $visits;
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

function createUser()
{
    /*default value*/
    if (!isset($_POST['first_name']) || !isset($_POST['first_name'])) {
        die("first name and last name is required");
    }

    if (!isset($_POST['home_address'])) {
        $_POST['home_address'] = null;
    }
    if (!isset($_POST['email'])) {
        $_POST['email'] = null;
    }
    if (!isset($_POST['home_phone'])) {
        $_POST['home_phone'] = null;
    }
    if (!isset($_POST['cell_phone'])) {
        $_POST['cell_phone'] = null;
    }

    $db_selected = connectDataBase();

    $query = "INSERT INTO users (first_name, last_name,home_address, email,home_phone,cell_phone)VALUES ('"
        . $_POST['first_name'] . "','" . $_POST['last_name'] . "','"
        . $_POST['home_address'] . "','" . $_POST['email'] . "','"
        . $_POST['home_phone'] . "','" . $_POST['cell_phone'] . "')";

//    print_r($query);
    $result = array();

    if (!$db_selected) {
        die("Could not connect to database");
    } else {
        $result = mysql_query($query);
        if (!$result) {
            die('Invalid query: ' . mysql_error());
        } else {
            header('Content-Type: application/json');
            print_r('{"status": true}');
        }
    }

}

function searchUser($type, $value)
{
    $query = "SELECT * FROM users WHERE";
    if (!$type || !$value) {
        return "fail";
    }

    switch ($type) {
        case "names":
            $query .= " first_name LIKE '%" . $value
                . "%' OR last_name LIKE '%" . $value . "%'";
            break;
        case "email":
            $query .= " email LIKE '%" . $value . "%'";
            break;
        case "phone numbers":
            $query .= " home_phone LIKE '%" . $value
                . "%' OR cell_phone LIKE '%" . $value . "%'";
            break;
    }

    $query .= " ORDER BY id DESC";

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