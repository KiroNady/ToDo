<?php
function extractQuery($queries){
    $arr = preg_split("/(&)/" , $queries);

    foreach($arr as $val){
        $tmp = explode ('=' , $val);
        $res[$tmp[0]] = $tmp[1];
    }
    return $res;
}


?>