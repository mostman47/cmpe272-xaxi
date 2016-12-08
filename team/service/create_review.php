<?php
include 'mysql.php';
extract($_POST);
print_r(createReview($user_id, $product_id, $text, $rate, $date_time));

?>