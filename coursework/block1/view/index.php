<?php
	error_reporting(2047);
	ini_set("display_errors",1);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);
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
		
    	<title>Cmp306 - Web Services Development Block 1</title>
	</head> 
        
	<body>

	    	<!-- header row -->
    	<div id="header1234" class="card text-center">
		<div class="jumbotron text-center" style="background-color:black;margin-bottom:0;">
			<div style="text-align: left;"><img src="../image/Logo1.jpg" width="250" alt="Not yet done" /></div>
			<div class="card-img-overlay">
					<h1 class="card-title">Cmp306 Web Services Development Block 1</h1>
            		<h2 class="card-title">E-commerce</h2>
            		<h3>This site if part of a student assessment - All images are copyright (gear4music)</h3>
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
				<a class="nav-link" href="Login.php">Login</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="AdminSec.php">Stock</a>
				</li>    
				<li class="nav-item">
				<a class="nav-link" href="Record.php">Record</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="Logout.php">Logout</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="../../../coursework/index.php">Back</a>
				</li> 
				</ul>
				</div>  
				</nav>

    		</div>
    		
    		<br/>

            <div class="row">
                <!-- Display items -->
                <?php
					include("../model/api.php") ;
					$itemtxt = getAllItems() ;
					$item = json_decode($itemtxt) ;
					for ($i=0; $i< sizeof($item); $i++) {
						echo '<div class="col-lg-4 col-md-4 col-sm-4">' ;
						echo '<div class="card">' ;
						echo '<div class="card-header">' ;
						echo $item[$i] -> name ;
						$id = $item[$i] -> id;
						echo '</div>' ;
						echo '<div class="card-block">' ;
						echo '<img class="img-fluid" src="../image/'.$item[$i]->image.'" />' ;
						echo '<p>'.$item[$i] -> description.'</p>' ; 
						echo '<p>Price &pound;'.$item[$i] -> price.'</p>' ; 
						echo '</div>' ;
						echo '<div class="card-footer">' ;
						echo '<a href="MoreDeets.php?id=',urlencode($id),'" class="btn btn-primary">More Details</a>' ;
						echo '</div>' ;
						echo '</div>' ;
						echo '</div>' ;
					}
					echo '</div>'
				?>
			</div><!-- row -->
            
        </div><!-- container -->
        <br/>
		<br/>
    <!-- Bootstrap Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>
   