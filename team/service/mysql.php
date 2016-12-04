<?php


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

function getAllVisit()
{

    $query = 'SELECT * FROM visit';

    return selectQuery($query);

}

function searchVisit($productId)
{
    $query = 'SELECT * FROM visit WHERE product_id = "' . $productId . '"';
    return selectQuery($query);
}

function createVisitObj($productId)
{
    $query = 'INSERT INTO visit (`product_id`,`count`) VALUES ("' . $productId . '",1)';
//    print_r($query);
    return selectQuery($query);
}

function updateVisitObj($productId, $count)
{
    $count++;
    $query = 'UPDATE visit SET `count` = ' . $count . ' WHERE product_id = "' . $productId . '"';
//    print_r($query);
    return selectQuery($query);
}

function updateVisitSQL($productId)
{
    $search = searchVisit($productId);
    if (mysql_num_rows($search) > 0) {
        return updateVisitObj($productId, mysql_fetch_assoc($search)['count']);
    } else {
        return createVisitObj($productId);
    }
}

function getAllProduct()
{

    $query = 'SELECT * FROM products';

    return selectQuery($query);

}

function getAllProductExternal()
{
    $external_urls = array(0 => 'http://localhost:8888/cmpe272-xaxi/service/external_products.php');
    $products = array();
    foreach ($external_urls as $url) {
//        print_r($url);
        $ch = curl_init();

        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_FOLLOWLOCATION => true
        ));

        $output = curl_exec($ch);
        $output = json_decode($output, true);
        $products = array_merge($products, $output);
    }
//    print_r($product);
    return $products;
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