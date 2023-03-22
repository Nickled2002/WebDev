<?php
	error_reporting(2047);
	ini_set("display_errors",1);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);


    $username = $usermail = $shipAdd = $cardNum = $productName = $productPrice = $productId = "" ;
    $usernametb = $usermailtb = $shipAddtb = $cardNumtb = "" ;
    


session_start();//start new sesh

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){//check if the user is already logged in

    header("location: index.php");//redirect to home page

}

//$_SESSION["id"] = 

if($_SERVER["REQUEST_METHOD"] == "POST"){//processing form data
 

    if(empty(trim($_POST["username"]))){//check username field empty
        $usernametb = "Please enter the your full name.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["usermail"]))){
        $usermailtb = "Please enter the product description.";
    } else{
        $usermail = trim($_POST["usermail"]);
    }

    if(empty(trim($_POST["shipAdd"]))){
        $shipAddtb = "Please enter your shipping address";
    } else{
        $shipAdd = trim($_POST["shipAdd"]);
    }

    if(empty(trim($_POST["cardNum"]))){//check if field empty
        $cardNumtb = "Please enter the product price.";
    } else{
        $cardNum = trim($_POST["cardNum"]);
    }

    if(empty(trim($_POST["productName"]))){//check if field empty
    } else{
        $productName = trim($_POST["productName"]);
    }
    if(empty(trim($_POST["productPrice"]))){
    } else{
        $productPrice = trim($_POST["productPrice"]);
    }
    if(empty(trim($_POST["productId"]))){
    } else{
        $productId = trim($_POST["productId"]);
    }

    $transactionrec= "nl212345";
        //  set up the data to be inserted
        $insert = new stdClass() ;
        $insert -> id = null ;
        $insert -> itemname = $productName ;
        $insert -> address = $shipAdd ;
        $insert -> email = $usermail ;
        $insert -> name = $username ;
        $insert -> transaction_name = $transactionrec ;

        //  set up the request
        $request = new stdClass();
        $request -> jsonrpc = "2.0" ;
        $request -> method = "createRecord" ;
        $request -> params = $insert ;
        $request -> id = "510572" ;
        $txt = json_encode($request) ;

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

    $transaction = "nl212345";

    // Set up the JSON first
    $data -> vendor = "2001975" ; // student number
    $data -> transaction = $transaction ; // string of length 8
    $data -> amount = $productPrice ; // amount less than 100
    $data -> card = $cardNum ; // 16 digit number 1234567890123456

    $request = json_encode($data) ;

    // echo $request ;

    $url = "https://mayar.abertay.ac.uk/~g510572/aberpay/v3/" ;
    $ch = curl_init() ;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($request)) );
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    echo $response ;
    curl_close($ch);
    $transaction = json_decode($response);
    $transactionStatus = $transaction -> status;
    if ($transactionStatus==1)
    {
        $request = new stdClass() ;
            $request -> jsonrpc = "2.0" ;
            $request -> method = "getItemById" ;
            $request -> params = $productId ;  
            $request -> id = "510572" ;
            $txt = json_encode($request) ;
            
            $url = "https://mayar.abertay.ac.uk/~2001975/cmp306/api/block1/index.php" ;
            $ch = curl_init($url) ;
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST") ;
            $headers = array (
                'Content-Type: application/json',
                'Content-Length: ' . strlen($txt) ) ;
            curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers) ;
            curl_setopt ($ch, CURLOPT_POSTFIELDS, $txt) ;
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true) ;
            $response = curl_exec($ch);
            curl_close($ch);
            
        $itemtxt = json_decode($response);
        $stitem = $itemtxt -> result;

        $stocknum = $stitem -> stock;
        $stockmin = 1;
        $stockfin = $stocknum - $stockmin;

        //  set up the data to be inserted
        $insert = new stdClass() ;
        $insert -> id = $productId ;
        $insert -> stock = $stockfin ;

        //  set up the request
        $request = new stdClass();
        $request -> jsonrpc = "2.0" ;
        $request -> method = "updateItem" ;
        $request -> params = $insert ;
        $request -> id = "510572" ;
        $txt = json_encode($request) ;

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
        header("location: OrderPlaced.php");
        

    }
    else
    {
        if ($transactionStatus==0)
        {
            header("location: OrderNotPlaced.php?id=$productId");
        }
        

    }

    //echo $response ;

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
            		<h2 class="card-title">Checkout</h2>
			</div>
        </div>
		</div>
        </div>
    		
    	<br/><?php

        $url = ($_SERVER['REQUEST_URI']) ;
        $url_components = parse_url($url) ;
        parse_str($url_components['query'],$params) ;
        $id = $params['id'] ;

        $request = new stdClass() ;
        $request -> jsonrpc = "2.0" ;
        $request -> method = "getItemById" ;
        $request -> params = $id ;  
        $request -> id = "510572" ;
        $txt = json_encode($request) ;

        $url = "https://mayar.abertay.ac.uk/~2001975/cmp306/api/block1/index.php" ;
        $ch = curl_init($url) ;
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST") ;
        $headers = array (
            'Content-Type: application/json',
            'Content-Length: ' . strlen($txt) ) ;
        curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers) ;
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $txt) ;
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true) ;
        $response = curl_exec($ch);
        curl_close($ch);
        $itemtxt = json_decode($response);
        $item = $itemtxt -> result;
        $pName = $item -> name;
        $pItem = $item -> price;

        ?>
        <div class="col-lg-4 col-md-4 col-sm-4">
	    <div class="card">
	    <div class="card-header">Checkout</div>
        <div class="card-block">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
            <label for="productId">Product id:</label><br>
            <input type="text" id="productId" name="productId" class="form-control" value="<?php echo $id ?>" readonly> <br>
            <span class="invalid-feedback">
            <br>
            </div>
            <div class="form-group">
            <label for="productName">Product Name:</label><br>
            <input type="text" id="productName" name="productName" class="form-control" value="<?php echo $pName ?>" readonly> <br>
            <span class="invalid-feedback">
            <br>
            </div>
            <div class="form-group">
            <label for="productPrice">Product Price:</label><br>
            <input type="text" id="productPrice" name="productPrice" class="form-control" value="<?php echo $pItem ?>" readonly> <br>
            <span class="invalid-feedback">
            <br>
            </div>
            <div class="form-group">
            <label for="username">Full Name:</label><br>
            <input type="text" id="username" name="username" class="form-control <?php echo (!empty($usernametb)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
            <span class="invalid-feedback"><?php echo $usernametb; ?></span>
            <br>
            </div>
            <div class="form-group">
            <label for="usermail">Email Address:</label><br>
            <input type="text" id="usermail" name="usermail" class="form-control <?php echo (!empty($usermailtb)) ? 'is-invalid' : ''; ?>" value="<?php echo $usermail; ?>">
            <span class="invalid-feedback"><?php echo $usermailtb; ?></span>
            <br>
            </div>
            <div class="form-group">
            <label for="shipAdd">Shipping Address:</label><br>
            <input type="text" id="shipAdd" name="shipAdd" class="form-control <?php echo (!empty($shipAddtb)) ? 'is-invalid' : ''; ?>" value="<?php echo $shipAdd; ?>">
            <span class="invalid-feedback"><?php echo $shipAddtb; ?></span>
            <br>
            </div>
            <div class="form-group">
            <label for="cardNum">Card Number:</label><br>
            <input type="text" id="cardNum" name="cardNum" class="form-control <?php echo (!empty($cardNumtb)) ? 'is-invalid' : ''; ?>" value="<?php echo $cardNum; ?>">
            <span class="invalid-feedback"><?php echo $cardNumtb; ?></span>
            <br><br>
            </div>
        <input type="submit" class="btn btn-primary" value="Add to database">
        </form> 
        </div>
        <div class="card-footer">
        </div>
        </div>
        </div>

        <!-- Bootstrap Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>