<?php
include 'mysql.php';
print_r(json_encode(mysql_fetch_assoc(searchReviewByProduct($_GET['id']))));
?>