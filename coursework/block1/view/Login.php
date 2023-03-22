<?php
	error_reporting(2047);
	ini_set("display_errors",1);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);



    
include("../model/connection.php");//connect to database
$connect =  getDatabaseConnection() ;
global $connect;


session_start();//start new sesh

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){//check if the user is already logged in

    header("location: index.php");//redirect to home page

}
 
 

$username = $password = $admin = "";//define vars
$usertb = $passtb = $logintb = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){//processing form data
 

    if(empty(trim($_POST["username"]))){//check username field empty
        $usertb = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    

    if(empty(trim($_POST["password"]))){//check pass field empty
        $passtb = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    

    if(empty($usertb) && empty($passtb)){//check if fields empty

        $sql = "SELECT id, username, password, admin FROM users WHERE username = ?";//sql select stmnt
        
        if($stmt = mysqli_prepare($connect, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_username);//variables bind in the sql select stmnt
            
          
            $param_username = $username;//Set params
            

            if(mysqli_stmt_execute($stmt)){//try execute sql stmnt

                mysqli_stmt_store_result($stmt);//store result
                

                if(mysqli_stmt_num_rows($stmt) == 1){//check if in result username exists               

                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $admin);//result vars including if they are admin
                    if(mysqli_stmt_fetch($stmt)){//check if pass correct exists
                        if(password_verify($password, $hashed_password)){//password is correct
                            
                            
                            
                            
                            $_SESSION["loggedin"] = true;//store data in sesh vars
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["admin"] = $admin ; 


                            header("location: index.php");

                        } else{
                            
                            $logintb = "Invalid username or password.";//password is wrong
                        }
                    }
                } else{

                    $logintb = "Invalid username or password.";//username doest exist
                }
            } else{
                echo "Error, try again.";//weird error help
            }


            mysqli_stmt_close($stmt);//close stmnt
        }
    }
    

    mysqli_close($connect);//close connect
}
?>
<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    	<meta charset="utf-8">
        <title>Login</title>
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
                    <h2>Please fill in your credentials to login.</h2>

                <?php 
                if(!empty($logintb)){
                    echo '<div class="alert alert-danger">' . $logintb . '</div>';
                }        
                ?>
                <div class="col-lg-5 col-md-5 col-sm-5">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control <?php echo (!empty($usertb)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                    <span class="invalid-feedback"><?php echo $usertb; ?></span>
                </div>    
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control <?php echo (!empty($passtb)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $passtb; ?></span>
                </div>
                <div class="form-group">
                    <a href="index.php" class="btn btn-primary">Back</a>
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
                <p>Don't have an account? <a href="Register.php">Register</a>.</p>
                </form>
				</div>
        		</div>
				</div>
                </div>

    </body>
</html>
   