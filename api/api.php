<?php

include 'api_db.php';
//echo "welcome";

//echo $_SERVER['PATH_INFO'];
$dbarr = db();

$method = $_SERVER['REQUEST_METHOD'];
//print_r($_SERVER);

$req = $_SERVER['REQUEST_URI'];

if ($req == "/home" and $method == 'GET'){
    print_r($dbarr);
}

else {
    
}



?>