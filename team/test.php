<?php
$product = getAllProduct();
while ($row = mysql_fetch_assoc($product)) {
    $row['id'] = 'xaxi' . $row['id'];
    $row['image'] = '././assets/images/soda/' . $row['image'];
    $data[] = $row;
}
print_r(json_encode($data));
function getAllProduct()
{

    $query = 'SELECT * FROM products';

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

function connectDataBase()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "KyperBelt_19";
    $dbname = "konstella";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//    $database = mysql_connect('localhost:3306', 'root', 'admin');
    return mysql_select_db('xaxi', $connection);
}

?>