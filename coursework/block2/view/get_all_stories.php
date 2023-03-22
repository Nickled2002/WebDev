<?php
	error_reporting(2047);
	ini_set("display_errors",1);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);

	//  PHP to get all the employees 
	//  URL of the web service
	include("location.php") ;
	$url = $location ;
	echo $url ;
	echo "<br/><br/>" ;
	
	//  set up the CURL
	$curl = curl_init($url) ;
  	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");                                                                                                                                     
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                                                                                                                                                                           
  	$resp = curl_exec($curl) ;

  	//  Output the results
  	if (!$resp) {die('Error : "'.curl_error($curl).'" - Code: '.curl_errno($curl)); }
  	curl_close($curl) ;	
  	
  	$story = simplexml_load_string($resp) ;
  	$story = $story -> story ;
  	
  	$n = sizeof($story) ;
  	echo "There are ".$n." Stories<br/>" ;
  	for ($i=0; $i<$n; $i++) {
  		echo $story[$i]->id." " ;
  		echo $story[$i]->story_name." " ;
  		echo $story[$i]->story_description." " ;
  		echo $story[$i]->story_date ;
  		echo "<br/>" ;
  	}
?>
