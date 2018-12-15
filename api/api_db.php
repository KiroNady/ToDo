<?php 

class db{
    private $dbarray;
    function db(){
        $dbFile = file("db.txt");
        $dbarray = array();

        foreach($dbFile as $num => $line){
            $dbarray[$num] = $line;
        }
    }

    public function getdbarray(){
        return $dbarray;
    }
}

?>