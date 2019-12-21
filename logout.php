<?php 
session_start();
session_unset($_SESSION['username']);
$_SESSION['username']='';

header('location:index.php');




?>