<?php


	
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
            	<h1 class="card-title">Cmp306 - Block 2 - Manchester</h1>
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
			<a class="nav-link" href="Logout.php">Logout</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="AdminSec.php">Admin Section</a>
			</li> 
			<li class="nav-item">
			<a class="nav-link" href="../../../coursework/index.php">Back</a>
			</li>    
			</ul>
			</div>  
			</nav>
        </div>

        <br/>
		<div class="container">
  		<div class="row">
    	<div class="col-sm-4">
		<?php 
  	    	//  connect to the live URL
            $api = "ce6709987967c00037de80f2d117db88" ;
  		    //  $url = "https://api.openweathermap.org/data/2.5/weather?q=London&appid=".$api."&mode=xml" ;
  		    //  Or for testing use the local data
  		    $url = "../model/manchester-weather.xml" ;
  		    
  		    $xmltxt = file_get_contents($url) ; 
		    $xml = simplexml_load_string($xmltxt)  ;
		    
		    //  use the function to cache the data
			include("../model/getweatherxml.php") ;
			$xml = getweatherXML() ;
			
		    
		    echo '<div class="card">' ;
		    echo '<div class="card-header">'.$xml ->  city["name"].'</div>' ;
		    echo '<div class="card-block" style="height:400px;" >' ;
		    echo 'Update :'.$xml -> lastupdate["value"]."<br/>" ;
		    echo 'Sunrise :'.$xml -> city -> sun["rise"]."<br/>" ;
		    echo 'Sunset :'.$xml -> city -> sun["set"]."<br/>" ;
		    echo '<br/>' ;
		    echo 'Current Weather: <br/>' ;
		    $temperature = $xml -> temperature["value"] - 273 ;
		    echo 'temperature : '.$temperature."<br/>" ;
		    $wind = $xml -> wind ;
		    $speed = round($wind -> speed["value"] * 3.6) ;
		    echo 'wind : '.$wind -> speed["name"].' '.$speed.'kph '.$wind -> direction["code"].'<br/>' ;
		    echo '</div>' ;
		    echo '<div class="card-footer">Data &#169;openweathermap.org</div>' ;
		    echo '</div>' ;
			
	    ?>
		</div>
    	<div class="col-sm-4">
		<div class="card">
		<div class="card-header">
		<p>Manchester Google Maps</p> 
		</div>
		<div class="card-block">
		<div id="googleMap" style="width:100%;height:400px;"></div>
		<script>
		function myMap() {
		var mapProp= {
			center:new google.maps.LatLng(53.483959,-2.244644),
  			zoom:10,
		};
		var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
		}
		</script>

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnfq4WR62cfezbMjg2wjp-uT3IjfhwWNY&callback=myMap"></script>
		</div>
		<div class="card-footer">Data &#169;Google</div>
		</div>
    	</div>
    	<div class="col-sm-4">
		<div class="card">
		<div class="card-header">
		<h1>Link to RSS Feed</h1>
		</div>
		<div class="card-block">
		<br>
		<a href="https://mayar.abertay.ac.uk/~2001975/cmp306/ws/block2/story" class="btn btn-primary">Link</a>
		</div>
		<br>
		<div class="card-footer">Data &#169;NLE 2001975</div>
		</div>
    	</div>
  		</div>
		  <br/>
		
		<?php
		$api = "ce6709987967c00037de80f2d117db88" ;
		$url = "http://newsrss.bbc.co.uk/rss/newsonline_uk_edition/england/manchester/rss.xml" ;
		$xml = new DOMDocument() ;
		$xml->load($url) ;
		$xsl = new DOMDocument() ;
		$xsl->load("../model/rss.xsl") ;
		$proc = new XSLTProcessor() ;
		$proc -> importStyleSheet($xsl) ;
		$result = $proc -> transformtoXML($xml) ;
		echo '<div class="row">' ;
		echo $result ;
		echo '</div>' ;
		
		?>
	
		  <br/>
		  <?php
		
		$url = "https://mayar.abertay.ac.uk/~2001975/cmp306/ws/block2/story" ;
		$xml = new DOMDocument() ;
		$xml->load($url) ;
		$xsl = new DOMDocument() ;
		$xsl->load("../model/my_rss.xsl") ;
		$proc = new XSLTProcessor() ;
		$proc -> importStyleSheet($xsl) ;
		$result = $proc -> transformtoXML($xml) ;
		echo '<div class="row">' ;
		echo $result ;
		echo '</div>' ;
		
		?>
		</div>
		

		

		

        <!-- Bootstrap Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
