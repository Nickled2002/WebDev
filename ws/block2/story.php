<?php
error_reporting(2047);
ini_set("display_errors",1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

	// Connect to database
	include("connection.php");
	$connect =  getDatabaseConnection();
	
	// library contains all the methods required from the Web Service
	include("library.php") ;
 
	$request_method=$_SERVER["REQUEST_METHOD"];
	// $call = $_SERVER["PHP_SELF"];
	// $request = $_SERVER['REQUEST_URI'];
	
	switch($request_method)
	{
		case 'GET':
			// Retrive Story
			if(isset($_GET['id']))
			{
				$id=$_GET["id"];
				$resp = getStory($id);
				header('Content-Type: text/xml');
				echo $resp ;
			}
			else
			{
				$resp = getAllStories();
				header('Content-Type: text/xml');
				echo $resp ;
			}
			break;
		case 'POST':
			// Insert Story
			$xml = file_get_contents('php://input') ;
			$resp = insertStory($xml);
			echo $resp ;
			break;
		case 'PUT':
			// Update Story
			$id=$_GET["id"];
			$xml = file_get_contents('php://input') ;
			$resp = updateStory($id, $xml);
			echo $resp ;
			break;	
		case 'DELETE':
			// Delete Story
			$id=$_GET["id"];
			$resp = deleteStory($id);
			echo $resp ;
			break;
		
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}

?>