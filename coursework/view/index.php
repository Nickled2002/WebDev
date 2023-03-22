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

		
    	<title>Cmp306 - Portfolio</title>
	</head> 
        
	<body>

	    <!-- header row -->
    	<div id="header" class="card text-center">
		<div class="jumbotron text-center" style="background-color:black;margin-bottom:0;">
			<div style="text-align: left;"><img src="../image/Logo.jpg" width="250" alt="Not yet done" /></div>
			<div class="card-img-overlay">
            	<h1 class="card-title">Cmp306 Portfolio</h1>
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
			<a class="nav-link" href="../block1/index.php">Block1</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="../block2/index.php">Block2</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="../block3/index.php">Block3</a>
			</li>    
			<li class="nav-item">
			<a class="nav-link" href="../block4/index.php">Block4</a>
			</li> 
			</ul>
			</div>  
			</nav>
        </div>

        <br/>
		<h1 style="text-align: center;"> Cmp306 Block Documentation</h1>
		<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-2">
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4">
		<h2 style="text-align: left;">Block 1</h2>
		<p>Payment gateways are used daily to facilitate the transaction of capital, mainly in the e-commerce sector. However, the concept of payment gateways dates back to 1996 with the creation of the first payment gateway. Nowadays countless payment gateways exist. Stripe is a rather recent addition to the list created in California USA in 2010. However, from a developer’s point of view Stripe’s APIs and tools are created in such a way that the devel-opment of a website becomes facile. Stripe’s custom user interface tool allows a payment process to be developed without the need for previous coding knowledge. This UI tool is able to be adapted for even very niche situations for example the application of different discounts at the checkout process depending on what subscription the client will want to subscribe to (Figure 1). The concept of customised user interface tools that do not require coding is crucial to be implemented in a payment gateway due to the fact that a developer is not required to know how to code to be able to develop their own payment system. But Stripe additionally provides the possibility for a developer with light previous knowledge of coding to implement their own payment system. Going on Stripe’s developer documents tu-torials are provided in video format going step by step to demonstrate once again even the more unusual development processes which allow for a developer to easily learn the process of implementing a payment system for their own web spaces. Moving onto Stripe’s API. Stripe’s API requests can happen both in test mode and in live mode. Live mode is used for a finished payment system and processes information normally. However, test mode is meant to be used while building the payment system and uses dummy cards that simulate transactions, however, do not get really processed. This allows for the methods to be tested. These dummy cards will simulate a lot of scenarios that could happen in a real-life situation rangeing from all existing card brands from all the continents (Figure 2) to disputes and refunds and even additional levels of security like 3D Secure or Pin codes. This level of detail provided on the testing and how testing should be effectuated is large to the point that the docu-mentation goes into very specific situations. This is very advantageous from a developer's point of view allowing a developer to prepare the system that they are building for all kinds of situations. To conclude Stripe is a good contestant for the most reliable to implement payment gateway solely due to the volume and detail that their documentation goes in.</p>
		<h4 style="text-align: left;">Reference List</h4>
		<p>Akey, C. (2018). A History of Payment Gateways. [online] Medium. Available at: https://medium.com/@coleman.akey/a-history-of-payment-gateways-e58fdbcde9f1 [Accessed 9 Dec. 2022].</p>
		<p>stripe.com. (n.d.). API keys. [online] Available at: https://stripe.com/docs/keys.</p>
		<p>stripe.com. (n.d.). Developer tools. [online] Available at: https://stripe.com/docs/development [Accessed 9 Dec. 2022].</p>
		<p>stripe.com. (n.d.). Test your integration. [online] Available at: https://stripe.com/docs/testing.</p>
		<p>support.bigcommerce.com. (n.d.). BigCommerce Help Center. [online] Available at: https://support.bigcommerce.com/s/article/Connecting-Stripe-Payment-Gateway?language=en_US [Accessed 9 Dec. 2022].</p>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
		<figure>
    	<img src='../image/Figure1stripe.png' width="450" alt='missing' />
    	<figcaption>Figure 1.</figcaption>
		</figure>
		<br>
		<br>
		<figure>
    	<img src='../image/Figure2stripe.png' width="450" alt='missing2' />
    	<figcaption>Figure 2.</figcaption>
		</figure>
		</div>
		</div>
		<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-2">
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4">
		<h2 style="text-align: left;">Block 2</h2>
		<p>Data is a very valuable resource and naturally, depending on the provider of the data they can exchange that resource for monetary gain. Additionally, the provider of the data has the ability to decide how they would price the service they are providing to keep the process of purchasing the data as equitable as possible for each user’s needs. In order to monitor the use of the data calls were introduced. A call is a request for the retrieval of data from a user. Therefore, a company could monitor the use of the calls and from that devise a pricing plan for multiple cases. There exist two main ways of pricing. The first pricing plan is the most straightforward one and works by monitoring the amount of calls a client would use and setting a price per call thus charging the client the amount they owe. The second pricing plan is more complex and uses a similar pricing strategy as network provider companies have adopted of charging for a monthly subscription that allows, depending on the selected price point, for a certain amount of calls per month to be made and certain amounts of calls each minute to be made. These price points range from use for a single individual, which would usually be free, and would allow for a very limited amount of calls to be effectuated, up to an enterprise which would require a much higher number of calls compared to one user. Additionally, another parameter needed to be considered is the level of complexity needed for the data that is provided to be gathered. (Figure 1.) As seen in this figure, the more complex the data the higher the amount charged by the company is. In a setting where I was providing this kind of service, I would choose the latter method. Charging a monthly subscription would ensure that the costs needed to maintain the service provided are paid off by the clients and that a profit is generated monthly. Additionally in the case that a person would run out of possible calls to be spent each month I would not stop allowing the calls to be retrieved rather I would offer the possibility of the system to keep running and charge an additional price in the following renewal of the subscription.</p>
		<h4 style="text-align: left;">Reference List</h4>
		<p>Google Maps Platform. (n.d.). Pricing Plans and API Costs. [online] Available at: https://mapsplatform.google.com/pricing/.</p>
		<p>OpenWeatherMap.org (2012). Price - OpenWeatherMap. [online] Openweathermap.org. Available at: https://openweathermap.org/price.</p>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
		<figure>
    	<img src='../image/Figure1.PNG' width="450" alt='missing' />
    	<figcaption>Figure 1.</figcaption>
		</figure>
		</div>
		</div>
		<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-2">
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4">
		<h2 style="text-align: left;">Block 3</h2>
		<p>Block three of cmp306 consists of the development of one device that was communicating with one user through the use of a database. In this instance, we used a SQL database. However, if we were to extend this system to one that is at a commercial level the use of a SQL database would prove very inefficient and would require the creation of a database for each user of the system. In this scenario, a NoSQL database would be appropriate. NoSQL databases store data in a format other than relational tables and allow for better scalability of users. Unfortunately, this system requires greater storage however, it allows for a greater processing demand. The storage through the use of documents would allow the administrator to find and process results faster with the use of a key that leads to the specified data. This type of IoT system or Internet of Things system would require said documents to be saved as JSON documents that could automatically be saved with more ease. One contender for this type of system is Google's Firebase. Firebase is compatible with many languages and would also allow for the use of NoSQL databases fixing the issue of limiting the use of the system for one device to one user situations. Google’s Firebase is vastly used in this sector for multiple very popular google applications that store mass amounts of data that are then being processed such as YouTube (Figure 1.). Additionally, Google’s firebase has many features that would allow for adaptive implementation in a multiple IoT devices / multiple users' system. To conclude, the IoT system we developed in block three used PhpMyAdmin as the SQL database and gathers information from a device with sensors but is limited to one device and one user. And in order to adapt this system to a larger scale it would be more efficient to implement a NoSQL database which does not require a specific structure to run since they are not consisting of tables and allow for much easier insertion of data due to the fact that it does not require outside assistance for that process to be completed. </p>
		<h4 style="text-align: left;">Reference List</h4>
		<p>Mehta, A. (2019). What is Google Firebase and why should your startup use it? [online] Ap-pinventiv. Available at: https://appinventiv.com/blog/firebase-for-startups/ [Accessed 13 Dec. 2022].</p>
		<p>MongoDB (2019). NoSQL Databases Explained. [online] MongoDB. Available at: https://www.mongodb.com/nosql-explained.</p>
		<p>Wikipedia Contributors (2019). Firebase. [online] Wikipedia. Available at: https://en.wikipedia.org/wiki/Firebase.</p>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
		<figure>
    	<img src='../image/Figure1Google.png' width="450" alt='missing' />
    	<figcaption>Figure 1.</figcaption>
		</figure>
		<br>
		<br>
		</div>
		</div>
        <!-- Bootstrap Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
