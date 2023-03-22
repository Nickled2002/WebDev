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

	$url = ($_SERVER['REQUEST_URI']) ;
    $url_components = parse_url($url) ;
    parse_str($url_components['query'],$params) ;
	$id = $params['id'] ;


    if($_SERVER["REQUEST_METHOD"] == "POST"){//processing form data
        
		$finalId = trim($_POST["productId"]);

        //  set up the request
        $request = new stdClass();
        $request -> jsonrpc = "2.0" ;
        $request -> method = "deleteStoryById" ;
        $request -> params = $finalId ;
        $request -> id = "510572" ;
        $txt = json_encode($request) ;


        //  set up for the curl
        $url = "https://mayar.abertay.ac.uk/~2001975/cmp306/api/block2/index.php" ;
        $ch = curl_init($url) ;
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        $headers = array (
	        'Content-Type: application/json', 
	        'Content-Length: ' . strlen($txt) ) ;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers) ;
        curl_setopt($ch, CURLOPT_POSTFIELDS, $txt);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch) ;

		//echo $response ; 
		echo '<p>Item deleted from database</p>' ;
        header("location: AdminSec.php");
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
		
    	<title>Cmp306 - Web Services Development Block 2</title>
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
				<a class="nav-link" href="AdminSec.php">Back</a>
				</li> 
				</ul>
				</div>  
				</nav>

        </div>
        <br/>
        <h1> Are you sure you want to delete this item?</h1>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<div class="form-group">
            <label for="productId">Product id:</label><br>
            <input type="text" id="productId" name="productId" value="<?php echo $id ?>" readonly><br><br>
            <span class="invalid-feedback"><?php echo $productdesctb; ?></span>
            <br>
            </div>
        <input type="submit" class="btn btn-primary" value="Yes Delete">
        </form> 
    <!-- Bootstrap Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>
   

