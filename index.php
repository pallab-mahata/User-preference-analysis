<?php
include_once("db.php");

if($_SESSION['username']!="")
{
    header('Location:search.php');
}


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
		//echo "sucess";
		header('Location:search.php');
		//header('Location:registration.php');
		
	}
	else
	{
		
		// echo 'invalid username or password';
		
	}
	
}

?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  
 <!-- <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600'> -->

      <link rel="stylesheet" href="css/style.css">
	  
  
</head>

<body>
  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		
		<div class="login-form">
		
			<form action="#" method="post" name="sign_in" onsubmit="fun_sign()" >
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input name='email' id="email" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input name='password' id="password" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" name="login" value="Login" >
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
			</div>
			</form>
			<form action="#" method="post" id="reg_form">
				<div class="sign-up-htm">
					<div class="group">
						<label for="user" class="label">Username</label>
						<input name='username' id="username" type="text" class="input" required>
					</div>
					<div class="group">
						<label for="pass" class="label">Email Address</label>
						<input  name='email' id="email" type="text" class="input" required>
					</div>
					<div class="group">
						<label for="pass" class="label">Password</label>
						<input  name='password' id="password" type="password" class="input" data-type="password" required>
					</div>
					<div class="group">
						<label for="pass" class="label">Repeat Password</label>
						<input  name='repassword' id="repassword" type="password" class="input" data-type="password" required>
					</div>					
					<div class="group">
						<input type="button" class="button" name="sign_up"value="Sign Up" onclick="formSubmit()">
					</div>
					<div class="hr"></div>
						<div class="foot-lnk">
						<label for="tab-1">Already Member?</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
 
<script src="js/jquery.min.js"></script> 
 <script type="text/javascript">
 function formSubmit(){
//alert(5);
	 $.ajax({
		 url: "registration.php", 
		 type: 'POST',
		 data: $('#reg_form').serialize(),
		 success: function(f){
								//alert(f);
								if(f!=0)
								{
									alert(f);
								}
								else if(f==0)
								{
									window.location.href="search.php";
								}
									
										
							 }
	});
 }
	function fun_sign()
	{
		var pw1 = document.sign_in.password.value;
        var uname=document.sign_in.email.value;
		if(pw1=="" || uname=="")
		{
			alert("username or password invalid")
		}
		
	}
 
 </script>

 
</body>
</html>
