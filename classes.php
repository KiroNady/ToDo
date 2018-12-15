<?php
class car {
    function Car($model){
        $this->model = $model;
    }
}

$car = new car("bmw");

echo "$car->model \n"


?>