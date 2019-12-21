<?php
include_once("db.php");
$username=$_REQUEST['username'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$repassword=$_REQUEST['repassword'];
if($username=='')
{
	echo 'Enter username';
	
}// username null check if end here

else if($email=='')
{
	echo 'Enter valid email';
}
else if($password=='')
{
	echo 'Enter Password';
}
else
{
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		echo 'Enter valid email';
	}
	elseif($password!=$repassword)
	{
		echo 'Password mismatch.Please retype.';
	}
	else{
	$sql="select * from login_info where email='".$email."'";
	$query=mysql_query($sql);
	$row=mysql_num_rows($query);
	if($row<1)
	{
    $sql2="select * from login_info where user_name='".$username."'";
	$query=mysql_query($sql2);
	$row=mysql_num_rows($query);
	if($row<1)
	{
	$sql="INSERT INTO login_info(user_name,email,password)VALUES('".$username."','".$email."','".$password."')";
	$query=mysql_query($sql) or die(mysql_error());
	$_SESSION['username']=$username;
	echo 0;
	//header('Location:search.php');
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
	
	
	
	
}
?>