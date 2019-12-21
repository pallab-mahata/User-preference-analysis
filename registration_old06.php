<?php

include_once("db.php");
if(isset($_POST['sign_up']))
{	
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$repass=$_POST['repassword'];
	$uname=$_POST['username'];
	
	$sql="select * from login_info where email='".$email."'";
	$query=mysql_query($sql);
	$row=mysql_num_rows($query);
	
	if($row<1)
	{
    	$sql2="select * from login_info where user_name='".$uname."'";
		$query=mysql_query($sql2);
		$row1=mysql_num_rows($query);
	
		if($row1<1)
		{
			$sql="INSERT INTO login_info(user_name,email,password)VALUES('".$uname."','".$email."','".$pass."')";
			$query=mysql_query($sql) or die(mysql_error());
			header('Location:index.php');

			
		}
		else
		{
			echo ' username already Exits';
		}
	}
	else
	{
		echo 'email already Exits';
	}
	
	
	
}

?>
