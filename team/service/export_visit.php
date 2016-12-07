<?php
include 'mysql.php';
//$product = getAllProduct();
//while ($row = mysql_fetch_assoc($product)) {
//    $row['id'] = 'xaxi' . $row['id'];
//    $row['image']='././assets/images/soda/'.$row['image'];
//    $data[] = $row;
//}
//print_r(json_encode($data));
if (isset($_GET["site"])) {
    $visit = searchVisitBySite($_GET["site"]);
    while ($row = mysql_fetch_assoc($visit)) {
        $row['product_id'] = substr($row['product_id'], strlen($_GET["site"]));
        $data[] = $row;
    }
    print_r(json_encode($data));
}
?>