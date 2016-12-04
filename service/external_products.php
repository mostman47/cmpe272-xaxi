<?php
include 'mysql.php';
$product = getAllProduct();
while ($row = mysql_fetch_assoc($product)) {
    $row['id'] = 'xaxi' . $row['id'];
    $row['image']='././assets/images/soda/'.$row['image'];
    $data[] = $row;
}
print_r(json_encode($data));
?>