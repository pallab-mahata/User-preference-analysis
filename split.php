<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include_once('db.php');


if(isset($_GET['field1']) ) {
    $search = $_GET['field1'];
	
    $data = $_GET['field1']."++";
	$folderName=$_SESSION['username'];
	$location='docs/'.$folderName;
	if(is_dir($location)===true)
	{
		$path=$location.'/';
	}
	else
	{
		$dir=mkdir($location);
		$path=$dir.'/';
	}
	
	//echo $path;exit;
	$fileName=$_SESSION['username'].'.txt';
    $ret = file_put_contents($path.$fileName, $data, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "Your search has been saved.";
    }
	echo $search;
	header('Location:https://www.google.co.in/search?q='.$search);
}
else {
	
   die('no post data to process');
}



$p1=$_GET["field1"];
print("Search=".$p1);
$n = explode(" ", $p1);
$uname=$_SESSION['username'];
 mysql_connect("localhost","root","admin") or die("Unable to connect");
 mysql_select_db("search") or die(mysql_error());
 
 for($i=0; $i<sizeof($n); $i++)
{

   $a="select * from article_preposition_dictionary where upper(word)=upper('".$n[$i]."')"; 
      //echo $a;exit;
	$data_article=mysql_query($a) or die(mysql_error());  
	//echo $data_article;exit;
 if(!mysql_fetch_array($data_article))
   {
	$a="select * from word_dictionary where upper(word)=upper('".$n[$i]."') and user_name='".$uname."'";
	$data=mysql_query($a) or die(mysql_error());  
 if(mysql_fetch_array($data))
   {
	   $p="select count from word_dictionary where upper(word)=upper('".$n[$i]."')and user_name='".$uname."'";
	   $data1=mysql_query($p) or die(mysql_error());
	   if($_row=mysql_fetch_array($data1))
       { 
	   $count1=$_row["count"];
	   print("<br/>Not Inserted  ======= Value=".$n[$i]);
	   $a="update word_dictionary set count=".($count1+1)." where upper(word)=upper('".$n[$i]."' )and user_name='".$uname."'";
	  mysql_query($a) or die(mysql_error());
      }
  }		
  else
  {
	print("<br/>Inserted  ======== Value=".$n[$i]);
	$a="insert into word_dictionary values('".$uname."',upper('".$n[$i]."'),1)";
	$b="insert into word_dictionary values('upper('".$n[$i]."'),1) where user_name='".$uname."'" ;
	mysql_query($a) or mysql_query($b) ;
	//mysql_query($a) or die(mysql_error());
  }
 }


}

print("<br/><br/>Insert successful");
//header('Location:chart.php');

?>