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
            		<h2 class="card-title">E-commerce - Basket</h2>
            </div>
        	</div>
		</div>
        </div>
		<?php

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
            echo '<div class="col-lg-5 col-md-5 col-sm-5">' ;
			echo '<div class="card">' ;
		    echo '<div class="card-header">' ;
			echo '<h1>Basket</h1>' ;
			echo '</div>' ;
			echo '<div class="card-block">' ;
			echo '<p>'.$item -> name.' ------> Price &pound; :'.$item -> price.'</p>' ; 
			echo '</div>' ;
			echo '<div class="card-footer">' ;
			echo '<a href="Checkout.php?id=',urlencode($id),'" class="btn btn-primary">Proceed to checkout</a>' ;
			echo '</div>' ;
			echo '</div>' ;
			echo '</div>' ;
            ?>

        
    <!-- Bootstrap Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>
   