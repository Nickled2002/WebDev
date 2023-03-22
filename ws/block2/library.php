<?php
error_reporting(2047);
ini_set("display_errors",1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

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
		global $connect;
		$query="select * from cmp306_Stories order by id desc limit 12";
		$result=mysqli_query($connect, $query);
		$txt = '<stories>';
		while($row=mysqli_fetch_array($result))
		{
			$txt = $txt.convertToXML($row) ;
		}
		$txt = $txt.'</stories>' ;
		return $txt ;
	}

	//  function to get a specific story
	function getStory($id)
	{
		global $connect;
		$query="select * FROM cmp306_Stories where id=".$id ;
		$result=mysqli_query($connect, $query);
		$response = mysqli_fetch_array($result) ;
		$txt = convertToXML($response) ;
		return $txt ;
	}


	//  function to insert a single Story
	function insertStory($xml)
	{
		global $connect;
		$data = simplexml_load_string($xml);
		$story_name=$data -> story_name;
		$story_description=$data -> story_description;
		$story_date=$data -> description_date;
		$query="INSERT INTO cmp306_Stories SET name='".$story_name."', description='".$story_description."', date='".$story_date."'";
		$response = mysqli_query($connect, $query) ;
		$last_id = mysqli_insert_id($connect) ;
		if($response)
		{
			$resp = $last_id ;
		}
		else
		{
			$resp = 0 ;
		}
		return $resp ;
	}

	//  function to update a specific story
	function updateStory($id, $xml)
	{
		global $connect;
		$data = simplexml_load_string($xml);
		$story_name=$data -> story_name;
		$story_description=$data -> story_description;
		$story_date=$data -> description_date;
		$query="UPDATE cmp306_Stories SET name='".$story_name."', description='".$story_description."', date='".$story_date."' WHERE id=".$id;
		$response = mysqli_query($connect, $query) ;
		if($response)
		{
			$resp = 1 ;
		}
		else
		{
			$resp = 0 ;
		}
		return $resp ;
	}
	
	//  function to delete a specific story
	function deleteStory($id)
	{
		global $connect;
		$query="DELETE FROM cmp306_Stories WHERE id=".$id;
		$response = mysqli_query($connect, $query) ;
		if($response)
		{
			$resp = 1 ;
		}
		else
		{
			$resp = 0 ;
		}
		return $resp ;
	}
	
	
	
	

?>