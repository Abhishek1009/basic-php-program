<?php
$conn= mysqli_connect('localhost','root','','login_db');

function query($query)
{
    global $conn;
    return mysqli_query($conn,$query);
}

function escape($string)
{
    return mysqli_real_escape_string($conn,$string);
}



?>