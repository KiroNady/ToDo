<?php
class db{

    private $mysqli;
    
    function db(){
        global $mysqli;
        $mysqli = new mysqli("127.0.0.1" , "todoapp" , "ToDoApp");

        if ($mysqli->connect_error){
            die("connection failed: " . $mysqli->connect_error);
        }
        $mysqli->select_db("Tasks") or die("unable to open database");
        echo "connected successfully <br>\n";
        
        
    }

    function getdb(){
        global $mysqli;

        $sql = "select * from Tasks";
        $res = $mysqli->query($sql);
        if ($res->num_rows > 0){
            for ($i = 0; $i < $res->num_rows ; $i++){
                //print_r($row);
                echo json_encode(mysqli_fetch_object($res));
                echo "<br>\n";
                

            }
        }
        

    }
    function addNewElement($task){
        global $mysqli;

        
        $sql = "insert into Tasks (taskName , taskDes)
        VALUES( '" . $task->taskName . "' , '" . $task->taskDes ."'); "; 

        if ($mysqli->query($sql) === true){
            echo "element added <br>\n";
        }
        else {
            echo "Error: ". $mysqli->error . "\n";
        }
    }

    function delElement( $id){
        global $mysqli;

        $sql = "delete from Tasks where id = $id";

        if ($mysqli->query($sql) === true){
            echo "element deleted! <br>\n";
        }
        else {
            echo "Error: ". $mysqli->error . "\n";
        }
    }

    function createNewTable($tableName){
        global $mysqli;
        $sql = "create table " .  $tableName . " (id INT(6) unsigned auto_increment primary key, 
        taskName text NOT NULL , 
        taskDes text,
        date TIMESTAMP, 
        category text)";

        if ($mysqli->query($sql) === true){
            echo "table created successfully \n";
        }
        else {
            echo "Error: ". $mysqli->error . "\n";
        }
    }
    function ViewTask($id){
        global $mysqli;
        

        $sql = "select * from Tasks where id = $id";

        $res = $mysqli->query($sql);
        if ($res->num_rows > 0){
            echo json_encode(mysqli_fetch_object($res));
            echo "<br>\n";
        }
    }
}
?>

