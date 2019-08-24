<?php

if($_SERVER['REQUEST_METHOD']=="GET")
{
if(isset($_GET['id']) && isset($_GET['code']))
{
    
	$id=$_GET['id'];
	$code=$_GET['code'];
	echo $id.'<br>';
	echo $code;
    
    

//	mysql_connect('localhost','root','');
//	mysql_select_db('sample');
//	$select=mysql_query("select email,password from verify where id='$id' and code='$code'");
//	if(mysql_num_rows($select)==1)
//	{
//		while($row=mysql_fetch_array($select))
//		{
//			$email=$row['email'];
//			$password=$row['password'];
//		}
//		$insert_user=mysql_query("insert into verified_user values('','$email','$password')");
//		$delete=mysql_query("delete from verify where id='$id' and code='$code'");
//
//	}
//
}
}


?>
