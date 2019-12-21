<?php
//echo 123;exit();
include_once('db.php');


if(isset($_POST['field1']) ) {
    $search = $_POST['field1'];
	
    $data = $_POST['field1']."++";
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
?>


