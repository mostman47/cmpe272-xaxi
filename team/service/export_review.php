<?php
include 'mysql.php';
if (isset($_GET["site"])) {
    $visit = getRateAVGBySite($_GET["site"]);
    while ($row = mysql_fetch_assoc($visit)) {
        $row['product_id'] = substr($row['product_id'], strlen($_GET["site"]));
        $data[] = $row;
    }
    print_r(json_encode($data));
}
?>