<?php
    //get the current timestamp in seconds... true argument to get it as float
    $t1 = microtime(true);
    
    
    //open the file
    
    $string = file_get_contents("./generated.json");
    
    //decoding json data into a php array
    $dec = json_decode($string);

    $enc = json_encode($dec);
    $t2 = microtime(true);
    
    echo $t2-$t1;
    echo "\n"
    //print_r($dec);

    
?>