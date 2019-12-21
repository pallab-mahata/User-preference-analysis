<?php


error_reporting(E_ALL ^ E_DEPRECATED);
include_once('db.php');
	  
	  
	  $error_msg="";
/* Include the `fusioncharts.php` file that contains functions	to embed the charts. */

   include('jscript/fusioncharts.php');

/* The following 4 code lines contain the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection. */

   $hostdb = "localhost";  // MySQl host
   $userdb = "root";  // MySQL username
   $passdb = "admin";  // MySQL password
   $namedb = "search";  // MySQL database name

   // Establish a connection to the database
   $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

   /*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
   if ($dbhandle->connect_error) {
  	exit("There was an error with your connection: ".$dbhandle->connect_error);
   }
?>

<html>
   <head>
   <style type="text/css">
button{
	
	color:red;
}
.buttonholder{
	text-align:right;
}

</style>
  	<title>FusionCharts XT - Column 2D Chart - Data from a database</title>
    <link  rel="stylesheet" type="text/css" href="css/style.css" />

  	<!-- You need to include the following JS file to render the chart.
  	When you make your own charts, make sure that the path to this JS file is correct.
  	Else, you will get JavaScript errors. -->

  	<script src="jscript/fusioncharts.js"></script>
  </head>

   <body>
   <div class="buttonholder">
   <a href="logout.php" title="logout" ><button type="button" >Log Out</button></a>
   </div>
  	<?php
	if(isset($_POST['showchart']))
       {

         $user=$_POST['search'];
		 if($user!="")
		 {
			 // Form the SQL query that returns the top 10 most populous countries
     	$strQuery = "SELECT word,count FROM word_dictionary where user_name='".$user."' ORDER BY count DESC LIMIT 20 ";
        
     	// Execute the query, or else return the error message.
     	$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        
     	// If the query returns a valid response, prepare the JSON string
     	if ($result) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData = array(
        	    "chart" => array(
                  "caption" => "Top 10 Most search",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);
            // echo $arrData[] ;exit;
        	$arrData["data"] = array();

	// Push the data into the array
        	while($row = mysqli_fetch_array($result)) {
           	array_push($arrData["data"], array(
              	"label" => $row["word"],
              	"value" => $row["count"]
              	)
           	);
        	}

        	/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        	$jsonEncodedData = json_encode($arrData);

	/*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

        	$columnChart = new FusionCharts("column2D", "myFirstChart" , 600, 300, "chart-1", "json", $jsonEncodedData);

        	// Render the chart
        	$columnChart->render();

        	// Close the database connection
        	$dbhandle->close();
     	}
		 }
		 else
	   {
		   $error_msg='please Enter some value';
	   }
		
	   }
	
  	?>

  	<div id="chart-1"><!-- Fusion Charts will render here--></div>
	<br>
	<br>
	
	<br>
	<br>
	<div id="usersearch">
	 <form class="wrapper" action="" method="post">
	 <center>
  	  <input type="text" placeholder="Search here..." name="search"><span style="color:red;"><?= $error_msg;?></span>
      <!--input type="hidden" placeholder="" required id="cokname" name="cokname" value= "tse" -->
	  <button type="submit" name="showchart">Search</button>
	  <button type="button" name="showchart"><a href="userlist.php" target="_blank">Show Users</a></button>
	  </center>
     </form>
	</div>
	
<script type="text/javascript">
    $(window).on('beforeunload', function() {
        if (iWantTo) {
            return 'you are an idiot!';
        }
    }); 
</script>
	
	
   </body>

</html>