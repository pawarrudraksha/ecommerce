<?php
    $server="localhost:3307";
    $username="root";
    $password="";
    $database="mystore";
    $conn=mysqli_connect($server,$username,$password,$database);
    
    if(!$conn){
        die("connection to this database failed due to ".mysqli_connect_error());
    }
?>