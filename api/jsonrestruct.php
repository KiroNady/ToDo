<?php
// restruction of json data get by the user

class json{
    private $req;

    function setJson($req){
        $this->$req = $req;
    }
    function getJson($req){
        return $this->$req;
    }


    function ToJson(){
        $json = json_encode($req);
    }

    function update($row , $column){

    }
    
}

?>
