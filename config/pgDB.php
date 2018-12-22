<?php

class pg{
    private $pg;

    function pg(){
        global $pg;

        $pg = pg_connect("host=127.0.0.1 user=postgres password=root");
        //$myPDO = new PDO('pgsql:host=127.0.0.1;dbname=DBNAME', 'USERNAME', 'PASSWORD');
        if ($pg->connect_error){
            die("connection failed: " . $pg->connect_error);
        }
        else {
            echo "connection to postgres successful\n";
        }
        echo "done";
        $pg->query("create database Tasks");
        echo "done1";
        $pg->pg_connect("dbname=Tasks") or die("unable to open database");
        echo "connected successfully <br>\n";
    }


}


?>