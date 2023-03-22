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

		
    	<title>Cmp306 - Block 3</title>
	</head> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>
	<body>

	    <!-- header row -->
    	<div id="header" class="card text-center">
		<div class="jumbotron text-center" style="background-color:black;margin-bottom:0;">
			<div style="text-align: left;"><img src="../image/Logo.jpg" width="250" alt="Not yet done" /></div>
			<div class="card-img-overlay">
            	<h1 class="card-title">Cmp306 - Block 3 - ElectricImp</h1>
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
			<a class="nav-link" href="../../../coursework/index.php">Back</a>
			</li>
			</ul>
			</div>  
			</nav>
        </div>

        <br/>
		<div class="container">
		<div class="col-sm-6">
		<div class = "row" style="text-align: left;">

		<a href="https://agent.electricimp.com/KLI-ZSjSTt9T?pin=8&state=1" class=" btn btn-success"> Red Switch On</a><br/>

		<a href="https://agent.electricimp.com/KLI-ZSjSTt9T?pin=8&state=0" class=" btn btn-danger"> Red Switch Off</a><br/>
		</div>
		<br/>
		<div class = "row" style="text-align: left;">

		<a href="https://agent.electricimp.com/KLI-ZSjSTt9T?pin=9&state=1" class=" btn btn-success"> Green Switch On</a><br/>

		<a href="https://agent.electricimp.com/KLI-ZSjSTt9T?pin=9&state=0" class=" btn btn-danger"> Green Switch Off</a><br/>

		</div>
		</div>
		<div class="col-sm-4">
		</div>
		<br>
		<br>
		<div class = "row" style="text-align: left;">
		<div class="col-sm-8">
		<canvas id="myChart" style="width:100%;max-width:700px"></canvas>
		<p>Red: Internal Temperature</p>
        <p>Blue: External Temperature</p><br>
		</div>
		<div class="col-sm-4">
		<p>Date & time this temperature was taken on:</p>
        <p></p>
        <p>Internal Temperature: {}</p>
        <p>External Temperature: {}</p><br>
		</div>
		</div>	
		</div>
		<?php
		//  set up the request
		$request = new stdClass();
		$request -> jsonrpc = "2.0" ;
		$request -> method = "getAllTemp" ;
		$request -> id = "510572" ;
		$txt = json_encode($request) ;
		echo $txt.'<br/><br/>' ;

		//  set up for the curl
		// $url = "localhost/mayar.abertay.ac.uk/cmp306/jsonrpc/index.php" ;
		$url = "https:///mayar.abertay.ac.uk/~2001975/cmp306/api/block3/index.php" ;
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
		$a = array();
		$b = array();
		$itemtxt =json_decode($response);
		$item = $itemtxt->result;
		for ($i=0; $i< sizeof($item); $i++)
		{
			$check = $item[$i] ->state;
			$checktxt =json_decode($check);
			for ($x=0; $x<sizeof($check); $x++;)
			{
			if($checktxt[$x] ->pin == 8)
				{
					$ext=$checktxt[$x] -> value;
					array_push($a,$ext);
				}else
				{
					if($checktxt[$x] ->pin == 9)
				{
					$int=$checktxt[$x] -> value;
					array_push($b,$int);
				}
   				}
			}

		}

		?>
		<script>
			window.setTimeout( function() { window.location.reload(); }, 30000);
		var xValues = [00,01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24];

		new Chart("myChart", {
  		type: "line",
  		data: {
    		labels: xValues,
    		datasets: [{ 
      		data: <?php print_r($b);?>,
      		borderColor: "red",
     		 fill: false
   		 },  { 
      		data: <?php print_r($a);?>,
      		borderColor: "blue",
      		fill: false
    	}]
  		},
  		options: {
    		legend: {display: false}
  		}
		});
</script>

		

        <!-- Bootstrap Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
