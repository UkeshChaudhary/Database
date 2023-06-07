<?php
function db_connect(){
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "ukesh";
    $connection = new mysqli($host, $username, $password, $database);
    //$connection = mysqli_connect($host, $username, $password, $database);
    if(!$connection){
        //echo $connection->connect_error;
        die("Connection Failed");
    }else{
        return $connection;
    }
}
?>