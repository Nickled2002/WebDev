<?php
	error_reporting(2047);
	ini_set("display_errors",1);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);



include("../model/connection.php");// Connect to database
$connect =  getDatabaseConnection() ;
global $connect;

$user = $pass = $cpass = ""; // define variables
$usertb = $passtb = $cpasstb=""; 

if($_SERVER["REQUEST_METHOD"] == "POST"){// beggining of the processing of data when submitted
 
    if(empty(trim($_POST["username"]))){//check if username field is empty
        $usertb = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){//checks if characters belong in a to z lower case or capital and numbers and underscores in the username field
        $usertb = "Username can only contain letters, numbers, and underscores.";
    } else{

        $sql = "SELECT id FROM users WHERE username = ?";//sql select statement
        
        if($stmt = mysqli_prepare($connect, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_username);//variables bind in the sql select stmnt
            
            
            $param_username = trim($_POST["username"]); //params
            

            if(mysqli_stmt_execute($stmt)){//try execute sql stmnt

                mysqli_stmt_store_result($stmt); //store results 
                
                if(mysqli_stmt_num_rows($stmt) == 1){//check if in result username exists
                    $usertb = "This username is already taken.";
                } else{
                    $user = trim($_POST["username"]);
                }
            } else{
                echo "Error, try again.";
            }


            mysqli_stmt_close($stmt); //stmnt closed
        }
    }
    

    if(empty(trim($_POST["password"]))){ //check if pass fiel is empty
        $passtb = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 7){//min 7 characters for extra security
        $passtb = "Password must have at least 7 characters.";
    } else{
        $pass = trim($_POST["password"]);
    }
    

    if(empty(trim($_POST["confirm_password"]))){//check if confirmed passford field is mpty
        $cpasstb = "Please confirm password.";     
    } else{
        $cpass = trim($_POST["confirm_password"]);
        if(empty($passtb) && ($pass != $cpass)){//check if pass anc confirmed pass match
            $cpasstb= "Password did not match.";
        }
    }
    

    if(empty($$usertb) && empty($passtb) && empty($cpasstb)){//start of input process in db also check fields
        
 
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";//sql insert statement
         
        if($stmt = mysqli_prepare($connect, $sql)){

            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);//variables bind in the sql insert stmnt
            

            $param_username = $user;//set params
            $param_password = password_hash($pass, PASSWORD_DEFAULT);//set params also creates hash
            

            if(mysqli_stmt_execute($stmt)){// try to execute stmnt

                header("location: Login.php");//success go to login
            } else{
                echo "Error, try again.";//error help
            }

            mysqli_stmt_close($stmt);//close stmnt
        }
    }
    
    mysqli_close($connect);//close connection
}
?>

<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    	<meta charset="utf-8">
        <title>Register</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1">

    	<!-- Bootstrap CSS -->
   	 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="maincss.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		
	</head> 

    <body>

	    <!-- overall container for page -->
	    <!-- <div class="container"> -->
	    
	    	<!-- header row -->
    		<div id="header1234" class="card text-center">
		<div class="jumbotron text-center" style="background-color:black;margin-bottom:0;">
			<div style="text-align: left;"><img src="../image/Logo1.jpg" width="250" alt="Not yet done" /></div>
			<div class="card-img-overlay">
					<h1 class="card-title">Cmp306 Web Services Development Block 1</h1>
            		<h2 class="card-title">E-commerce Login</h2>
			</div>
        	</div>
			</div>
    		<br/>
            <!-- </div> -->
        <div class="col-lg-5 col-md-5 col-sm-5">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($usertb)) ? 'is-invalid' : ''; ?>" value="<?php echo $user; ?>">
                <span class="invalid-feedback"><?php echo $usertb; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($passtb)) ? 'is-invalid' : ''; ?>" value="<?php echo $pass; ?>">
                <span class="invalid-feedback"><?php echo $passtb; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($cpasstb)) ? 'is-invalid' : ''; ?>" value="<?php echo $cpass; ?>">
                <span class="invalid-feedback"><?php echo $cpasstb; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <p>Already have an account? <a href="Login.php">Login here</a>.</p>
        </form>  
        </div>  
    </body>
</html>