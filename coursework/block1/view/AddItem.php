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
	$productname = $productdesc = $productimg = $productprice = $productstock = "";//define vars
    $productnametb = $productdesctb = $productimgtb = $productpricetb = $productstocktb = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){//processing form data
 

        if(empty(trim($_POST["productname"]))){//check username field empty
            $productnametb = "Please enter the product name.";
        } else{
            $productname = trim($_POST["productname"]);
        }
        
        if(empty(trim($_POST["productdesc"]))){//check username field empty
            $productdesctb = "Please enter the product description.";
        } else{
            $productdesc = trim($_POST["productdesc"]);
        }

        if(empty(trim($_POST["productimg"]))){//check username field empty
            $productimgtb = "Please enter the name of the product image.";
        } else{
            $productimg = trim($_POST["productimg"]);
        }

        if(empty(trim($_POST["productprice"]))){//check username field empty
            $productpricetb = "Please enter the product price.";
        } else{
            $productprice = trim($_POST["productprice"]);
        }

        if(empty(trim($_POST["productstock"]))){//check pass field empty
            $productstocktb = "Please enter your password.";
        } else{
            $productstock = trim($_POST["productstock"]);
        }
        //  set up the data to be inserted
        $item = new stdClass() ;
        $item -> id = null ;
        $item -> name = $productname ;
        $item -> image = $productimg ;
        $item -> description = $productdesc ;
        $item -> price = $productprice ;
        $item -> stock = $productstock ;


        //  set up the request
        $request = new stdClass();
        $request -> jsonrpc = "2.0" ;
        $request -> method = "createItem" ;
        $request -> params = $item ;
        $request -> id = "510572" ;
        $txt = json_encode($request) ;
        //echo $txt.'<br/><br/>' ;

        //  set up for the curl
        $url = "https://mayar.abertay.ac.uk/~2001975/cmp306/api/block1/index.php" ;
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
        
        echo '<p>Item Added to database</p>' ;
        header("location: AdminSec.php");
    
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
		
    	<title>Cmp306 - Web Services Development Block 1</title>
	</head> 
        
	<body>

	    	<!-- header row -->
    	<div id="header1234" class="card text-center">
		<div class="jumbotron text-center" style="background-color:black;margin-bottom:0;">
			<div style="text-align: left;"><img src="../image/Logo1.jpg" width="250" alt="Not yet done" /></div>
			<div class="card-img-overlay">
					<h1 class="card-title">Cmp306 Web Services Development Block 1</h1>
            		<h2 class="card-title">E-commerce - Admin</h2>
            		<h3>Welcome Admin</h3>
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
        <div class="col-lg-5 col-md-5 col-sm-5">
        <br/>
        <h1> Enter the details of the item you want to add</h1>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
            <label for="productname">Product Name:</label><br>
            <input type="text" id="productname" name="productname" class="form-control <?php echo (!empty($productnametb)) ? 'is-invalid' : ''; ?>" value="<?php echo $productname; ?>">
            <span class="invalid-feedback"><?php echo $productnametb; ?></span>
            <br>
            </div>
            <div class="form-group">
            <label for="productdesc">Product Description:</label><br>
            <input type="text" id="productdesc" name="productdesc" class="form-control <?php echo (!empty($productdesctb)) ? 'is-invalid' : ''; ?>" value="<?php echo $productdesc; ?>">
            <span class="invalid-feedback"><?php echo $productdesctb; ?></span>
            <br>
            </div>
            <div class="form-group">
            <label for="productimg">Product Image Name:</label><br>
            <input type="text" id="productimg" name="productimg" class="form-control <?php echo (!empty($productimgtb)) ? 'is-invalid' : ''; ?>" value="<?php echo $productimg; ?>">
            <span class="invalid-feedback"><?php echo $productimgtb; ?></span>
            <br>
            </div>
            <div class="form-group">
            <label for="productprice">Product Price:</label><br>
            <input type="text" id="productprice" name="productprice" class="form-control <?php echo (!empty($productpricetb)) ? 'is-invalid' : ''; ?>" value="<?php echo $productprice; ?>">
            <span class="invalid-feedback"><?php echo $productpricetb; ?></span>
            <br>
            </div>
            <div class="form-group">
            <label for="productstock">Product Stock:</label><br>
            <input type="text" id="productstock" name="productstock" class="form-control <?php echo (!empty($productstocktb)) ? 'is-invalid' : ''; ?>" value="<?php echo $productstock; ?>">
            <span class="invalid-feedback"><?php echo $productstocktb; ?></span>
            <br><br>
            </div>
            <input type="submit" class="btn btn-primary" value="Add to database">
        </form> 
        </div>

        
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>