<?php

require 'api_db.php';
require './config/pgDB.php';
include './config/utils.php';

//the time before starting the server
$t1 = microtime(true);

//the method used
$method = $_SERVER['REQUEST_METHOD'];

//the url
$req = $_SERVER['REQUEST_URI'];

//instance for the database (postgres)
$psql = new pg();

//default page 
if ($req == "/"){
    echo "to get all /home\n";
    echo "to add element /add posting json req\n";
    echo "to get one element /home/task(num)\n";
}

//home page
elseif ($req == "/home"){
    $psql->CreateTable();
    $psql->getAll();
}

//add an element
elseif ($req == "/add" && $method == "POST"){
    echo "here";
    $psql->addNewElement(json_decode(file_get_contents("php://input") , True));
    echo "Element added";
}

//get an element
elseif(preg_match('/(\/home)(\/task)(?<digit>\d+)/' ,$req , $matches)){
    
    print_r($matches);
    if ($method == "GET"){
        echo "getting element...";
        $psql->getOneElement($matches[3]);
    }
    elseif($method == "DELETE"){
        $psql->delElement($matches[3]);    
    }
}

//queries
else{
    $query = parse_url($req,PHP_URL_QUERY);
    if ($query != NULL){
        $queries = extractQuery($query);
        if (!in_array('sortBy' , $queries)){
            $queries['sortBy'] = NULL;
        }
        if (!in_array('label' , $queries)){
            $queries['label'] = NULL;
        }
        $psql->getSortBy($queries['sortBy'] , $queries['label']);
    }
}

$t2 = microtime(true);

echo "<br> </br> \n";
echo $t2-$t1;
echo "<br> </br> \n";



?>
