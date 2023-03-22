<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

    	<!-- Bootstrap CSS -->
   	 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="maincss.css">

		
    	<title>Cmp306 - Block1</title>
	</head> 
        
	<body>

	    <!-- header row -->
    	<div id="header" class="card text-center">
		<div class="jumbotron text-center" style="background-color:black;margin-bottom:0;">
			<div style="text-align: left;"><img src="../image/Logo.jpg" width="250" alt="Not yet done" /></div>
			<div class="card-img-overlay">
            	<h1 class="card-title">Cmp306 Block1</h1>
                <h2 class="card-title">E-commerce</h2>
            		<h3>Order attempt failed</h3>
			</div>
        	</div>
			</div>
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<a class="navbar-brand" href="index.php">Home</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav"> 
            <li class="nav-item">
                <?php 
                $url = ($_SERVER['REQUEST_URI']) ;
                $url_components = parse_url($url) ;
                parse_str($url_components['query'],$params) ;
                $id = $params['id'] ;
                echo '<a class="nav-link" href="Checkout.php?id=',urlencode($id),'">Try again</a>';
                ?>
			</li>
			</ul>
			</div>  
			</nav>
        </div>
