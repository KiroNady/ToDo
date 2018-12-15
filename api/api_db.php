<?php 


function db(){
    $dbFile = file("db.txt");

    $dbarray = array();
    foreach($dbFile as $num => $line){
        $dbarray[$num] = $line;
    }
    return $dbarray;
}


?>