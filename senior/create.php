<!DOCTYPE html>
<html>
    <head>
        <title>The create page</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    </head>
    <body>
        <?php
            include_once "../includes/dbconnection.php";
            $dbh = new PDO('mysql:host=localhost;dbname=capita51_tms', "capita51_tms_user", "@tms_userpassword");
            
            // define variables and set to empty values
			$firstnameErr  = $lastnameErr = $emailErr = $passwordErr = "";
			$firstname = $lastname = $email = $password = $password_confirm = "";
            $firstname_validated = $lastname_validated = $email_validated = $password_validated = "";
            
            if (isset($_POST["submit"])) {
			    if (empty($_POST["firstname"])) {
    				$firstnameErr = "First Name is required";
    			  } else {
    				$firstname = $_POST["firstname"];
    				// check if name only contains letters and whitespace
    					if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
    					  $firstnameErr = "Only letters and white space allowed"; 
    					}
    					else{$firstname_validated = true;}
    			  }
    			  
    			  if (empty($_POST["lastname"])) {
    				$lastnameErr = "Last Name is required";
    			  } else {
    				$lastname = $_POST["lastname"];
    				// check if name only contains letters and whitespace
    					if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
    					  $lastnameErr = "Only letters and white space allowed"; 
    					}
    					else{$lastname_validated = true;}
    			  }
    			  
    			  if (empty($_POST["email"])) {
    				$emailErr = "Email is required";
    			  } else {
    				$email = $_POST["email"];
    				// check if e-mail address is well-formed
    					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    					  $emailErr = "Invalid email format"; 
    					}
    					else{
    						$sql = "SELECT * FROM adminprivileg WHERE email = '$email'";
    						$result = mysqli_query($conn, $sql);
    						$result_check = mysqli_num_rows($result);
    						if($result_check > 0){
    							$emailErr = "Email Address already Exist";
    						}else{
    							$email_validated = true;
    						}
    					}
    			  } 
    
    			  if (empty($_POST["password"]) || empty($_POST["confirm_password"])) {
    				$passwordErr = "Password is required";
    			  } else {
    					$password = $_POST["password"];
    					$password_confirm = $_POST["confirm_password"];
    					// check if the passwords are the same
    					if (!($password == $password_confirm)) {
    					  $passwordErr = "Passwords doesn't match"; 
    					}
    					else{
    						$password_validated = true;
    					}
    			  }
            }
            
            if($firstname_validated && $lastname_validated && $email_validated && $password_validated){
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                $sql = $dbh->prepare("INSERT INTO adminprivileg (firstname, lastname, email, password)
                VALUES (:firstname, :lastname, :email, :password)");
                $sql->bindParam(':firstname', $firstname);
                $sql->bindParam(':lastname', $lastname);
                $sql->bindParam(':email', $email);
                $sql->bindParam(':password', $hashed_password);
                $sql->execute();
                
            // 	$sql = "INSERT INTO adminprivileg (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$hashed_password')";
            // 	if(mysqli_query($conn, $sql)){
            // 	    echo 'true';
            // 	}else{
            // 		echo "Error";
            // 	}
            }
            
        ?>    
        
        <div class="container">
			<div class="row">
				<div class="col-sm-3 .visible-xs, hidden-xs"></div>
				<div class=" col-sm-6 jumbotron">
					<div class="header">
					  <h4><i class="material-icons">lock_open</i> Sign Up</h4>
					</div>
					<div class=" container">
					  <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
								  <label for="firstname">Firstname</label><span class="text-danger"> *<?php echo $firstnameErr;?></span>
								  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Firstname" style="border-radius:12px;" required>
								</div>  
								<div class="col-sm-6">
								  <label for="lastname"></span>Lastname</label><span class="text-danger"> *<?php echo $lastnameErr;?></span>
								  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Lastname" style="border-radius:12px;" required>
								</div>
								<br>
								<div class="col-sm-12">
								  <label for="email">Email</label><span class="text-danger"> *<?php echo $emailErr;?></span>
								  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" style="border-radius:12px;" required>
								</div>
								<br>
								<div class="col-sm-6">
								  <label for="password">Password</label><span class="text-danger"> *<?php echo $passwordErr;?></span>
								  <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" style="border-radius:12px;" required>
								</div>  
								<div class="col-sm-6">
								  <label for="confirm_password">Comfirm Password</label>
								  <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Comfirm password" style="border-radius:12px;" required>
								</div>
								<br><br><br><br>
								<div class="col-sm-12 text-center">
									<button type="submit" name="submit" class="btn btn-primary btn-block" style="border-radius:12px;">Continue</button>
								</div>
							</div>
					  </form>
				 </div>
				 <div class="footer">
				</div>
			    </div>
    			</div>	
			</div>	
		</div>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/7e8e60d03d.js"></script>
    </body>
</html>
