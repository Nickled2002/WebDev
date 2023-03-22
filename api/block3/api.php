<?php
	error_reporting(2047);
	ini_set("display_errors",1);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);

	// Connect to database
	include("connection.php");
	$connect =  getDatabaseConnection() ;

		
	//  function to create an item
	function createRecord($txt) {
		global $connect ;
		$item = json_decode($txt) ;
		$stmt = $connect->prepare("insert into electricimp2 (devid, date, state) values (?, ?, ?)");
		$stmt->bind_param("sss", $id, $date, $state);
		$id = $item-> id ;
		$date = $item -> date ;  
		$state = $item -> state ;
		$result = $stmt->execute();
		if (!$result) {$result = 0 ;}
		return $result ;
	}

	//  function to update an item
	function updateLed($txt) {
		// $txt must contain the data for all fields.
		global $connect ;
		$insert = json_decode($txt) ;
		$stmt = $connect->prepare("update electricimp1 SET date=?, state=? where id=? ");
		$stmt->bind_param("sss", $date, $state, $id);
		$id = $item-> id ;
		$date = $item -> date ;  
		$state = $item -> state ;
		$result = $stmt->execute();
		if (!$result) {$result = 0 ;}
		return $result ;
	}

		//  function to get all the items
	function getAll()
	{
		global $connect;
		$sql = "SELECT * FROM electricimp1";
		$result = mysqli_query($connect,$sql);
		//  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		return json_encode($rows);
	}
	function getAllTemp()
	{
		global $connect;
		$sql = "SELECT * FROM electricimp2";
		$result = mysqli_query($connect,$sql);
		//  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		return json_encode($rows);
	}
	
	

?>