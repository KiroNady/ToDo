<?php

require 'api_db.php';
//echo "welcome";

//echo $_SERVER['PATH_INFO'];

$dbarr = new db();
print_r($dbarr->getdbarray());


/*
$method = $_SERVER['REQUEST_METHOD'];
//print_r($_SERVER);

$req = $_SERVER['REQUEST_URI'];

if ($req == "/home" and $method == 'GET'){
    print_r($dbarr);
}

else {
    
}
*/


?>