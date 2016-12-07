<?php
include 'mysql.php';
extract($_POST);
print_r(createReview($user_id, $prod_id, $text, $rate));

?>