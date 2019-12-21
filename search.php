<?php
include_once("db.php");
if($_SESSION['username']=="")
{
    header('Location:index.php');
}
echo "Welcome: ";
echo ucwords($_SESSION['username']);
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<form action="split.php" method="get">
<div class="btn pull-right">
<a href="logout.php"><button type="button" class="btn btn-danger">Log Out</button></a>
</div>
<center>
<img src="img/search.jpg" alt="picture" style="width:200px;height:200px;margin-bottom: 10px; margin-top: 20px;">

<div class="container">
	<div class="row">
           <div id="custom-search-input">
	            <div class="input-group col-md-8">
                    <input type="text" class="search-query form-control" name="field1" value="Search" placeholder="Search" />
                    <span class="input-group-btn">
                    <button class="btn btn-danger" type="button">
                    <span class=" glyphicon glyphicon-search"></span>
                    </button>
                    </span>
                </div>
            </div>
	</div>
</div>
</form>


</body>

</html>

