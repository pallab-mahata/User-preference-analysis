<?php
error_reporting(0);
@session_start(); //session start here
$connection=mysql_connect("localhost","root","admin");

if($connection)
{
	mysql_select_db("search") or die('Error Resultn: '.mysql_error());
}


?>