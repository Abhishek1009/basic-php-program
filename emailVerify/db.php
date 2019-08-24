<?php
ob_start();
define("server","localhost");
define("username","root");
define("password","");
define("database","sample");
$conn=mysqli_connect(server,username,password,database);
if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
function escape($query)
{
	global $conn;
	return mysqli_real_escape_string($conn,$query);
}
function query($query)
{
    global $conn;
    return mysqli_query($conn,$query);
}

function row_count($result)
{
    return mysqli_num_rows($result);
}

//$result=query("select * from verify");
//echo row_count($result);
//while($row=mysqli_fetch_assoc($result))
//{
//    echo $row['id']."<br>";
//    echo $row['email']."<br>";
//    echo $row['password']."<br>";
//    echo $row['code']."<br>";
//}

?>