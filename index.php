<!DOCTYPE html>
<html>
    <head>
        <title>Traning Management System | Login</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    </head>
    <body>
        <?php
            ob_start();
            include_once "includes/dbconnection.php";
            if(isset($_SESSION["s_firstname"])){
                 header("Location: dashboard.php");
             }
             
             function test_input($data) {
                $data = trim($data);
            	$data = stripslashes($data);
            	$data = htmlspecialchars($data);
            	return $data;
            }
        
        	$emailErr = $passwordErr = " ";
        	if(isset($_POST["submit"])){
        	    $email = test_input($_POST["email"]);
        	    $password = test_input($_POST["password"]);
        	    if(empty($email) || empty($password)){
        	        $emailErr = "Empty";
        	        $passwordErr = "Empty";
        	    }else{
        	       $sql = "SELECT * FROM adminprivileg WHERE email = '$email'";
        	       $result = mysqli_query($conn, $sql);
        	       $result_check = mysqli_num_rows($result);
        	       if($result_check < 1){
        	           $emailErr = "Invalid username/password";
        	           $passwordErr = "Invalid username/password";
        	       }else{
        	           if($row = mysqli_fetch_assoc($result)){
        	               //de-hashing the password
        	               $hashed_password_check = password_verify($password, $row["password"]);
        	               if($hashed_password_check == false){
        	                   $emailErr = "Invalid username/password";
        	                   $passwordErr = "Invalid username/password";
        	               }elseif($hashed_password_check == true){
        				    	// Log in the user here
        				    	$_SESSION["s_id"] = $row["id"];
        				    	$_SESSION["s_firstname"] = $row["firstname"];
        				    	$_SESSION["s_lastname"] = $row["lastname"];
        				    	$_SESSION["s_email"] = $row["email"];
        				    	header("Location: dashboard.php");
        					}
        				}
        		    }
        		}
        	}else{
        	    
        	}
        
        ?>
        
        <div class="container">
    	<div class="row">
    		<div class="col-sm-3 .visible-xs, hidden-xs"></div>
    		<div class="col-sm-6 jumbotron">
    			<div class="header">
    			  <h4><i class="material-icons">lock_open</i> Login</h4>
    			</div>
    			<div class="container">
    			  <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    				<div class="form-group">
    				  <label for="email"><i class="material-icons">account_circle</i> Username</label><span class="text-danger"> *<?php echo $emailErr;?></span>
    				  <input type="text" name="email" class="form-control" id="email" placeholder="Enter email" style="border-radius:12px;" required>
    				
    				  <label for="password"><i class="material-icons">vpn_lock</i> Password</label><span class="text-danger"> *<?php echo $passwordErr;?></span>
    				  <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" style="border-radius:12px;" required>
    				  <br><br><br>
    				
    				  <button type="submit" name="submit" class="btn btn-primary btn-block" style="border-radius:12px;"><span class="glyphicon glyphicon-off"></span> Login</button>
    				  </div>
    			  </form>
    			</div><br>
    			<div class="footer">
    			</div>
    		</div>	
    	</div>	
        </div>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/7e8e60d03d.js"></script>
    </body>
</html>