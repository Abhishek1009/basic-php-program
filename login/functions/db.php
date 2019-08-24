<?php

$conn= mysqli_connect('localhost','root','','login_db');

function escape($string){
    global $conn;
    return mysqli_real_escape_string($conn,$string);
}


function query($query){
    global $conn;
    return mysqli_query($conn,$query);
}

function confirm($result){
    global $conn;
    if(!$result){
        die("Query failed "+mysqli_error($conn));
    }
}

function fetch_array($result){
    global $conn;
    return mysqli_fetch_assoc($conn,$conn);
}






?>