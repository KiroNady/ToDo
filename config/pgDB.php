<?php

class pg{
    private $pg;

    function pg(){
        global $pg;
        
        $pg = pg_connect("user=default password= options='--client_encoding=UTF8'" ) ;
        echo pg_last_error($pg);
        echo pg_host();
        
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
            pg_query($pg , "create database tasks");
        }

        //connect to the database
        pg_connect ("dbname=tasks");

        echo pg_dbname();
    }

    function GetTable(){
        global $pg;

        $tables = pg_query($pg , "select * from pg_catalog.pg_Tables where tableowner='todo';");
        $tables = pg_fetch_all($tables);
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

    function getdb(){
        global $pg;

        

    }
    function addNewElement($task){
        global $pg;
        pg_query($pg , "insert into taskstb (taskname , taskdes)
        VALUES( '" . $task['taskname'] . "' , '" . $task['taskdes'] ."'); ");
        
    }
    function getAll(){
        global $pg;
        print_r(pg_fetch_all(pg_query($pg , "select * from taskstb")));
    }
    
    


}


?>