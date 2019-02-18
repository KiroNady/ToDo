<?php

class pg{
    private $pg;

    function pg(){
        global $pg;
        $pg = pg_connect(getenv("DATABASE_URL"));

        //create new user if it doesn't exist already 
        $users = pg_query("select usename from  pg_catalog.pg_user");
        $users = pg_fetch_all_columns($users);
        if (!in_array('todo' , $users)){
            pg_query("create user todo with password 'todo';");
        }

        //create the database if it does'nt exist
        $dbs = pg_query($pg , "select datname from pg_database" );
        $dbs = pg_fetch_all_columns($dbs);
        if (!in_array("tasks" , $dbs)){
            pg_query($pg , "create database tasks OWNER = todo");
        }

        //connect to the database
        pg_connect ("dbname=tasks");

    }

    function CreateTable(){
        global $pg;

        $tables = pg_query($pg , "select * from pg_catalog.pg_Tables where tableowner='todo';");
        $tables = pg_fetch_all_columns($tables);
        
        if ($tables == 0){
            pg_query($pg , "create table taskstb(
                id SERIAL
            );");
            pg_query($pg , "ALTER TABLE taskstb OWNER TO todo");
        }
        $columns = (pg_fetch_all_columns(pg_query($pg , "select column_name from INFORMATION_SCHEMA.COLUMNS where table_name = 'taskstb'")));
        if (!in_array('taskname' , $columns)){
            pg_query($pg , "ALTER TABLE taskstb ADD COLUMN taskname TEXT");
        }
        if (!in_array('taskdes' , $columns)){
            pg_query($pg , "ALTER TABLE taskstb ADD COLUMN taskdes TEXT");
        }
        if (!in_array('label' , $columns)){
            pg_query($pg , "ALTER TABLE taskstb ADD COLUMN label TEXT");
        }
        if (!in_array('date' , $columns)){
            pg_query($pg , "ALTER TABLE taskstb ADD COLUMN date timestamp");
        }
    }

    function addNewElement($task){
        global $pg;
        pg_query($pg , "insert into taskstb (taskname , taskdes)
        VALUES( '" . $task['taskname'] . "' , '" . $task['taskdes'] ."'); ");
        
    }
    function getAll(){
        global $pg;
        $result = pg_fetch_all(pg_query($pg , "select * from taskstb"));
        $json = json_encode($result);
        echo "$json";
    }
    
    function getOneElement($taskId){
        echo "in";
        global $pg;
        print_r(pg_fetch_all(pg_query($pg , "select * from taskstb where id = $taskId")));

    }
    
    function delElement($taskId){
        global $pg;
        $sql = pg_query($pg , "delete from Tasks where id = $taskId");
        if (!$sql === false){
            echo "element deleted";
        }
    }
    
    function updateElement($taskId){
        global $pg;
    }

    function getSortBy($column , $label){
        global $pg;
        if ($column == NULL){
            $column = 'id';
        }
        if ($label == NULL){
            $res = pg_fetch_all(pg_query($pg , "select * from taskstb ORDER BY $column"));
        }
        else{
            $res = pg_fetch_all(pg_query($pg , "select * from taskstb where label = $label ORDER BY $column"));
        }
        echo json_encode($res);
    }
}


?>