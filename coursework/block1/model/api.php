<?php
	// Connect to database
	include("connection.php");
	$connect =  getDatabaseConnection() ;
	
	//  function to get all the items
	function getAllItems()
	{
		global $connect;
		$stmt = mysqli_stmt_init($connect);
		$sql = "SELECT * FROM cmp306_Instruments";
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		//  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		return json_encode($rows);
	}
	
	//  function to get a single item
	function getItemById($id)
	{
		global $connect;
		$stmt = mysqli_stmt_init($connect);
		$sql = "SELECT * FROM cmp306_Instruments WHERE id= ? LIMIT 1" ;
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, 's', $id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row=mysqli_fetch_array($result) ;  //there is only 1 row
		return json_encode($row);
	}

	//  function to get all the transactions
	function getAllTransaction()
	{
		global $connect;
		$sql = "SELECT * FROM cmp306_Records";
		$result = mysqli_query($connect,$sql);
		//  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		return json_encode($rows);
	}

?>