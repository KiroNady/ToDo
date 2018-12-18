<?php 

class dbhandle{
    private $dbarray;
    private $counter;

    
    function dbhandle(){

        global $dbarray;
        global $counter;
        $dbFile = file("db.txt");
        $dbarray = array();

        foreach($dbFile as $num => $line){
            $dbarray[$num] = $line;
        }

        $counter = var_dump(count($dbarray));
        fclose($dbFile);
    }

    public function getdbarray(){
        return $GLOBALS['dbarray'];
    }

    public function addTodb($data){
        global $counter;
        $dbFile = fopen("db.txt" , "wr");
        $GLOBALS['dbarray'][$counter];
        $counter++;
        fwrite($dbFile , $data);

        fclose($dbFile);
    }
}

?>