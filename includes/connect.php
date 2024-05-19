<?php
    $server="localhost:3307";
    $username="root";
    $password="";
    $conn=mysqli_connect($server,$username,$password);
    
    if(!$conn){
        die("connection to this database failed due to ".mysqli_connect_error());
    }
?>