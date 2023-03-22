<?php
	error_reporting(2047);
	ini_set("display_errors",1);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);
	session_start();//start new sesh

	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){//check if the user is logged in
		if ($_SESSION["admin"] === false) {//check if the user is an admin
			header("location : index.php");//redirect to main page if is false go to index
			exit;
		}
	}



	if(empty($_SESSION["loggedin"]) || is_null($_SESSION["loggedin"])){//check if the user is not logged in
		header("location: index.php");//redirect to home page
		exit;
	}
	
?>
<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

    	<!-- Bootstrap CSS -->
   	 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="maincss.css">

		
    	<title>Cmp306 - Block 2</title>
	</head> 
        
	<body>

	    <!-- header row -->
    	<div id="header" class="card text-center">
		<div class="jumbotron text-center" style="background-color:black;margin-bottom:0;">
			<div style="text-align: left;"><img src="../image/Logo.jpg" width="250" alt="Not yet done" /></div>
			<div class="card-img-overlay">
            	<h1 class="card-title">Cmp306 - Block 2 - Admin Section</h1>
			</div>
        	</div>
			</div>
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<a class="navbar-brand" href="#">Home</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
			<li class="nav-item">
			<a class="nav-link" href="index.php">Back</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="AddStory.php">Add new item</a>
			</li>
			</ul>
			</div>  
			</nav>
			<div class="row">
            <br/>
            <br/>
                <!-- Display items -->
                <?php
                    
                	include("../model/api.php") ;
					$itemtxt = getAllItems() ;
					$item = json_decode($itemtxt) ;
					for ($i=0; $i< sizeof($item); $i++) {
						echo '<div class="col-lg-4 col-md-4 col-sm-4 d-flex align-items-stretch">' ;
						echo '<div class="card">' ;
						echo '<div class="card-header">' ;
						echo $item[$i] -> name ;
						$id = $item[$i] -> id;
						echo '</div>' ;
						echo '<div class="card-block">' ;
						echo '<p>'.$item[$i] -> description.'</p>' ; 
						echo '<p>Date: '.$item[$i] -> date.'</p>' ; 
						echo '</div>' ;
						echo '<div class="card-footer">' ;
						echo '<a href="UpdateStory.php?id=',urlencode($id),'" class="btn btn-primary" style="margin-right:16px">Update Stock</a>' ;
						echo '<a href="DeleteStory.php?id=',urlencode($id),'" class="btn btn-primary" style="margin-right:16px">Delete Item</a>' ;
						echo '</div>' ;
						echo '</div>' ;
						echo '</div>' ;
					}
				?>
			</div><!-- row -->
   
        </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>