<?php

include_once("db.php");
if(isset($_POST['login']))
{
	$email=$_POST['email'];
	$pass=$_POST['password'];
	
		
		if($email=='admin' and $pass=='mckvcse')
		{
			$_SESSION['username']=$email;
		header('Location:chart.php');
		
		
	}
	else
	{
		echo 'invalid username or password';
		
	}
	
}

?>
<html>
<head>
<title>
Admin page 
</title>
<link rel="stylesheet" href="css/theme-pink.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/animate.css" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:400,500,600,700|Montserrat:400,700">
	<link rel="shortcut icon" href="images/favicon.ico">
 
</head>
<body>
<center>

<h2>Admin Log In</h2>

<body>
<form action="#" method='post' style="margin-top:20px;" >
<label>Username : </label>
<input type='text' name='email' placeholder='Enter username' value="" required/>
<br>
<br>
<label>Password : </label>
 <input type='password' name='password' placeholder='password' minlength='5' maxlength='8' value="" width =50% required/>
 <br>
 <br>
 <input type='submit' name='login' value="Login" style="float:center;" />
 <br>



</form>
</body>
</center>
</html>

