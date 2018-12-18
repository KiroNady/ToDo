<?php

require 'api_db.php';
require '../config/database.php';
//echo "welcome";

//echo $_SERVER['PATH_INFO'];


$method = $_SERVER['REQUEST_METHOD'];
//print_r($_SERVER);

$db = new db();

//$db->createNewTable("Tasks");

//$db->addNewElement("task5" , "des");
//$db->delElement(2);
//$db->getdb();
//$req = $_SERVER['REQUEST_URI'];

$db->ViewTask(5);

/*
$dbarr = new db();

if ($req == '/home' and $method == 'GET' ){
    global $dbarr;
    print_r($dbarr->getdbarray());
}

elseif ($method == "POST"){
    global $dbarr;
    $dbarr->addTodb($_POST['Array']);
    print_r($_SERVER);
    echo "done";
}
*/

?>