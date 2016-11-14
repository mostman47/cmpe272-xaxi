<?php
include 'mysql.php';
$users = getAllUser();
while ($row = mysql_fetch_assoc($users)) {
    $data[] = $row;
}
print_r(json_encode($data));
?>