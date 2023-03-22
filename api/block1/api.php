<?php
	// Connect to database
	include("connection.php");
	$connect =  getDatabaseConnection() ;

		
	//  function to create an item
	function createRecord($txt) {
		global $connect ;
		$item = json_decode($txt) ;
		$stmt = $connect->prepare("insert into cmp306_Records (id, itemname, address, email, name, transaction_name) values (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $id, $itemname, $address, $email, $name, $transaction_name);
		$id = $item-> id ;
		$itemname = $item -> itemname ;  
		$address = $item -> address ;
		$email = $item -> email ; 
		$name = $item -> name ;
		$transaction_name = $item -> transaction_name;
		$result = $stmt->execute();
		if (!$result) {$result = 0 ;}
		return $result ;
	}

	//  function to create an item
	function createItem($txt) {
		global $connect ;
		$item = json_decode($txt) ;
		$stmt = $connect->prepare("insert into cmp306_Instruments (id, name, image, description, price, stock) values (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $id, $name, $image, $description, $price, $stock);
		$id = $item-> id ;
		$name = $item -> name ;  
		$image = $item -> image ;
		$description = $item -> description ; 
		$price = $item -> price ;
		$stock = $item -> stock ;
		$result = $stmt->execute();
		if (!$result) {$result = 0 ;}
		return $result ;
	}

	//  function to get all the items
	function getAllItems()
	{
		global $connect;
		$sql = "SELECT * FROM cmp306_Instruments LIMIT 6";
		$result = mysqli_query($connect,$sql);
		//  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		return json_encode($rows);
	}

	//  function to get all transactions
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
	
	//  function to update an item
	function updateItem($txt) {
		// $txt must contain the data for all fields.
		global $connect ;
		$insert = json_decode($txt) ;
		$stmt = $connect->prepare("update cmp306_Instruments SET stock=? where id=? ");
		$stmt->bind_param("ss", $stock, $id);
		$id = $insert-> id ;
		$stock = $insert -> stock ;
		$result = $stmt->execute();
		if (!$result) {$result = 0 ;}
		return $result ;
	}
	
	//  function to delete a single item by its id
	function deleteItemById($id)
	{
		global $connect ;
		$sql = "DELETE from cmp306_Instruments where id = ?" ;
		$stmt = mysqli_stmt_init($connect);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, 's', $id);
		$result = mysqli_stmt_execute($stmt);
		if (!$result) {$result = 0 ;}
		return $result ;
	}
	
	
	

?>