<?php

require 'api_db.php';
require './config/database.php';
require './config/pgDB.php';

$method = $_SERVER['REQUEST_METHOD'];
$req = $_SERVER['REQUEST_URI'];
$db = new db();
echo "beginnig\n";
$psql = new pg();
echo "\nend\n";

$result = rtrim($req, '/');


if ($req == '/home' and $method == 'GET' ){
    global $db;
    $db->getdb();
}


elseif ($req == '/add' ){
    global $db;
    //print_r(json_decode($_POST));
    $foo = file_get_contents("php://input");
    $db->addNewElement(json_decode($foo));
    echo "done";
}

elseif (preg_match('/(\/home)(\/task)(?<digit>\d+)/' ,$req , $matches)){
    global $db;
    if ($method == 'GET'){
        $db->ViewTask($matches[3]);
    }
    elseif ($method == "DELETE"){
        $db->delElement($matches[3]);
    }
}


?>
