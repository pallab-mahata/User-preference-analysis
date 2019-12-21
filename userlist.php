<?php 
include_once('db.php');
$result=mysql_query("select user_name from login_info");





?>


<!DOCTYPE html>
<html>
<head>
<style type="text/css">
.table{
	
	
	width:65%; 
    margin-left:5%; 
    margin-right:30%;
	
}
caption {
    caption-side: bottom;
}
body{
	background-color:pink;
}

</style>

</head>
<body>
<div class ="table">
<caption>Table of users</caption>
<table border="1" >
<tr>
<td>SLN</td>
<td>User Name</td>
</tr>
<?php
$i=1;
while($res_array=mysql_fetch_array($result)){
	
?>
<tr>
<td><?php echo $i ?></td>
<td><?php echo $res_array['user_name'] ?></td>
</tr>
<?php 
$i++;
}
?>
</table>
</div>

</body>
</html>