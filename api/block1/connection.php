<?php
	error_reporting(2047);
	ini_set("display_errors",1);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);
?>
<?php
function getDatabaseConnection() {
		//  Database connections 
		$servername = "lochnagar.abertay.ac.uk";
		$username = "sql2001975";
		$password = "DKeRKjN32IB4";
		$database = "sql2001975";
		$conn = mysqli_connect($servername,$username,$password,$database);
		// Check connection
		if (mysqli_connect_errno()) {
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		exit();
		}
		
		return $conn ;
		}
?>