<?php

require 'api_db.php';
require '../config/database.php';

$method = $_SERVER['REQUEST_METHOD'];
$req = $_SERVER['REQUEST_URI'];
$db = new db();


if ($req == '/home' and $method == 'GET' ){
    global $db;
    $db->getdb();
}


elseif ($method == "POST"){
    global $dbarr;
    $dbarr->addTodb($_POST['Array']);
    print_r($_SERVER);
    echo "done";
}


?>