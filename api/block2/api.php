<?php
	// Connect to database
	include("connection.php");
	$connect =  getDatabaseConnection() ;



	// Library of methods to support the Web Service	
	
	//  function to convert a single record from database to XML
	function convertToXML($query) {
		$txt ='<story>' ;
		$txt = $txt.'<id>'.$query["id"].'</id>' ;
		$txt = $txt.'<story_name>'.$query["name"].'</story_name>' ;
		$txt = $txt.'<story_description>'.$query["description"].'</story_description>' ;
		$txt = $txt.'<story_date>'.$query["date"].'</story_date>' ;
		$txt = $txt.'</story>' ;
		return $txt ;
	}	

	// function to get all (max 12) stories
	function getAllStories()
	{
		global $conn;
		$query="select * from cmp306_Stories order by id desc limit 12";
		$result=mysqli_query($conn, $query);
		$txt = '<stories>';
		while($row=mysqli_fetch_array($result))
		{
			$txt = $txt.convertToXML($row) ;
		}
		$txt = $txt.'</stories>' ;
		return $txt ;
	}

	//  function to create an item
	function createStory($txt) {
		global $connect ;
		$item = json_decode($txt) ;
		$stmt = $connect->prepare("insert into cmp306_Stories (id, name, description, date) values (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $id, $name, $description, $date);
		$id = $item-> id ;
		$name = $item -> name ;  
		$description = $item -> description ; 
		$date = $item -> date ;
		$result = $stmt->execute();
		if (!$result) {$result = 0 ;}
		return $result ;
	}


	//  function to get a single item
	function getStoryById($id)
	{
		global $connect;
		$stmt = mysqli_stmt_init($connect);
		$sql = "SELECT * FROM cmp306_Stories WHERE id= ? LIMIT 1" ;
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, 's', $id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row=mysqli_fetch_array($result) ;  //there is only 1 row
		return json_encode($row);
	}
	
	//  function to update an item
	function updateStory($txt) {
		// $txt must contain the data for all fields.
		global $connect ;
		$insert = json_decode($txt) ;
		$stmt = $connect->prepare("update cmp306_Stories SET name=?, description=?, date=?  WHERE id=? ");
		$stmt->bind_param("ssss", $name, $description, $date, $id);
		$id = $insert-> id ;
		$name = $insert -> name ;
		$description = $insert -> description ;
		$date = $insert -> date ;
		$result = $stmt->execute();
		if (!$result) {$result = 0 ;}
		return $result ;
	}
	
	//  function to delete a single item by its id
	function deleteStoryById($id)
	{
		global $connect ;
		$sql = "DELETE from cmp306_Stories where id = ?" ;
		$stmt = mysqli_stmt_init($connect);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, 's', $id);
		$result = mysqli_stmt_execute($stmt);
		if (!$result) {$result = 0 ;}
		return $result ;
	}
	
	
	

?>