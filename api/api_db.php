<?php 

class db{
    private $dbarray;
    function db(){

        global $dbarray;
        $dbFile = file("db.txt");
        $dbarray = array();

        foreach($dbFile as $num => $line){
            $dbarray[$num] = $line;
        }
    }

    public function getdbarray(){
        return $GLOBALS['dbarray'];
    }
}

?>