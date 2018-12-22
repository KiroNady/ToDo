<?php

class pg{
    private $pg;

    function pg(){
        global $pg;

        $pg = pg_connect("host=127.0.0.1 user=postgres password=root") or 
        die('Error: ' . preg_last_error());
        
        
    }

    function createDB(){
        pg_query("CREATE DATABASE Tasks") or die('Error: ' . preg_last_error());
    }
}


?>