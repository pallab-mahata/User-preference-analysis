<?php

include_once("db.php");
if(isset($_POST['login']))
{
	$email=$_POST['email'];
	$pass=$_POST['password'];
	  $sql="select * from login_info where user_name='".$email."' and password='".$pass."' "; 
	$query=mysql_query($sql);
	
	
	$row=mysql_num_rows($query);
	
	
	if($row>0)
	{
		$fetch=mysql_fetch_array($query);
		$_SESSION['username']=$fetch['user_name'];
		//echo 0;
		//header('Location:search.php');
		//header('Location:registration.php');
		
	}
	else
	{	
		//echo 'invalid username or password';
		//echo 1;
		
	}
	
}

?>
