<?php
extract($_POST);
if (!$username || !$password) {
    print("empty");
}else{
//    print("has");
    // This is the line I added
    header('Content-Type: application/json');
// Actual Code goes here
// Then make sure to wrap your final output in JSON
    echo '{"test":"this is some test json to try"}';
}


?>