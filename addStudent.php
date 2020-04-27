<?php 
    include_once "navbar_header.php";
    
    function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
    
    // Variable definition
    
    $firstname = $lastname = $email = $address = $phone_no = $gender = $c_edu_level = $amount_charged = $amount_paid = $outstanding_dept = $next_of_kin = $next_of_kin_address = $next_of_kin_phone = "";
    $firstnameErr = $lastnameErr = $emailErr = $addressErr = $phone_noErr = $genderErr = $c_edu_levelErr = $amount_chargedErr = $amount_paidErr = $outstanding_deptErr = $next_of_kinErr = $next_of_kin_addressErr = $next_of_kin_phoneErr = "";
    $firstname_validated = $lastname_validated = $email_validated = $address_validated = $phone_no_validated = $gender_validated = $c_edu_level_validated = $amount_charged_validated = $amount_paid_validated = $outstanding_dept_validated = $next_of_kin_validated = $next_of_kin_address_validated = $next_of_kin_phone_validated = "";
    $selected_courses = array();
    
    if (isset($_POST["submit"])) {
	    if (empty($_POST["firstname"])) { // check if name input is empty
	        $firstnameErr = "FirstName is required";
		  } else {
		      $firstname = test_input($_POST["firstname"]); // sanitize the input data
    		  // check if name only contains letters and whitespace
    			if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) { // check if name contains letters only
    			  $firstnameErr = "Only letters and white space allowed"; 
    			}
    			else{$firstname_validated = true;} // validate firstname
		  }
		  
		  if (empty($_POST["lastname"])) { // check if lastname input is empty
			    $lastnameErr = "LastName is required";
		  } else {
		      $lastname = test_input($_POST["lastname"]); // sanitize the input data
    		  // check if name only contains letters and whitespace
    			if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) { // check if name contains only letters
    			  $lastnameErr = "Only letters and white space allowed"; 
    			}
    			else{$lastname_validated = true;} // validate lastname
		  }
		  
		  if (empty($_POST["email"])) { // check if email input is empty
		      $emailErr = "Email is required";
		  } else {
		      $email = test_input($_POST["email"]); // sanitize input data
    		  // check if e-mail address is well-formed
    			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // filter email input 
    			  $emailErr = "Invalid email format"; 
    			}
    			else{
    				$sql = "SELECT * FROM students WHERE email = '$email'"; // check if email aready exits
    				$result = mysqli_query($conn, $sql);
    				$result_check = mysqli_num_rows($result);
    				if($result_check > 0){
    					$emailErr = "Email Address already Exist";
    				}else{
    					$email_validated = true; // validate email input
    				}
    			}
		  } 
		  
		  if (empty($_POST["phone_no"])) { // check if phone number input is empty
			    $lastnameErr = "Phone No is required";
		  } else {
		      $phone_no = test_input($_POST["phone_no"]); // sanitize input data
    	      // check if phone_no only contains numbers
    			if (!preg_match("/^[0-9]+$/",$phone_no)) { // check if it contains numbers only
    			  $phone_noErr = "Only numbers are allowed"; 
    			}
    			else{$phone_no_validated = true;} // validate phone no input
		  }
		  
		  if (empty($_POST["address"])) { // check if address is input is empty
			  $addressErr = "Address is required";
		  } else {
		      $address = $_POST["address"];
		      $address_validated = true; // validate address input
		  }
		  
		  if (empty($_POST["gender"])) { // check if gender input is empty
		      $genderErr = "Gender is required";
		  } else {
		      $gender = $_POST["gender"];
		      $gender_validated = true; // validate gender input
		  }
		  
		  if (empty($_POST["c_edu_level"])) { // check if c_edu_level input is empty
		      $c_edu_levelErr = "Level of  is required";
		  } else {
		      $c_edu_level = $_POST["c_edu_level"];
		      $c_edu_level_validated = true; // validate c_edu_level input
		  }
		  
		  if (empty($_POST["amount_charged"])) { // check if amount charged input is empty
			    $amount_chargedErr = "Amount charged is required";
		  } else {
		      $amount_charged = test_input($_POST["amount_charged"]); // sanitize input data
    	      // check if amount contains only numbers
    			if (!preg_match("/^[0-9]+$/",$amount_charged)) { // check if it contains numbers only
    			  $amount_chargedErr = "Only numbers are allowed"; 
    			}
    			else{$amount_charged_validated = true;} // validate amount input
		  }
		  
		  if (empty($_POST["amount_paid"])) { // check if amount paid input is empty
			    $amount_paidErr = "Amount paid is required";
		  } else {
		      $amount_paid = test_input($_POST["amount_paid"]); // sanitize input data
    	      // check if amount contains only numbers
    			if (!preg_match("/^[0-9]+$/",$amount_paid)) { // check if it contains numbers only
    			  $amount_paidErr = "Only numbers are allowed"; 
    			}
    			else{$amount_paid_validated = true;} // validate amount input
		  }
		  
		  if (empty($_POST["outstanding_dept"])) { // check if outstanding dept input is empty
			    $outstanding_deptErr = "outstanding dept is required";
		  } else {
		      $outstanding_dept = test_input($_POST["outstanding_dept"]); // sanitize input data
    	      // check if outstanding dept contains only numbers
    			if (!preg_match("/^[0-9]+$/",$outstanding_dept)) { // check if it contains numbers only
    			  $outstanding_deptErr = "Only numbers are allowed"; 
    			}
    			else{$outstanding_dept_validated = true;} // validate outstanding dept input
		  }
		  
		  if (empty($_POST["next_of_kin"])) { // check if next of kin name input is empty
	        $next_of_kinErr = "Next of kin full name is required";
		  } else {
		      $next_of_kin = test_input($_POST["next_of_kin"]); // sanitize the input data
    		  // check if name only contains letters and whitespace
    			if (!preg_match("/^[a-zA-Z ]*$/",$next_of_kin)) { // check if name contains letters only
    			  $next_of_kinErr = "Only letters and white space allowed"; 
    			}
    			else{$next_of_kin_validated = true;} // validate next_of_kin
		  }
		  
		  if (empty($_POST["next_of_kin_address"])) { // check if address is input is empty
			  $next_of_kin_addressErr = "Address is required";
		  } else {
		      $next_of_kin_address = $_POST["next_of_kin_address"];
		      $next_of_kin_address_validated = true; // validate address input
		  }
		  
		  if (empty($_POST["next_of_kin_phone"])) { // check if next_of_kin_phone input is empty
			    $next_of_kin_phoneErr = "Phone No is required";
		  } else {
		      $next_of_kin_phone = test_input($_POST["next_of_kin_phone"]); // sanitize input data
    	      // check if next_of_kin_phone only contains numbers
    			if (!preg_match("/^[0-9]+$/",$next_of_kin_phone)) { // check if it contains numbers only
    			  $next_of_kin_phoneErr = "Only numbers are allowed"; 
    			}
    			else{$next_of_kin_phone_validated = true;} // validate phone no input
		  }
		  
		  if($_POST["basic_computer_training"]){
		      $basic_computer_training_count = $_POST["basic_computer_training_count"];
		      while($basic_computer_training_count > 0){
		          $var = 'basic_computer_training_'.$basic_computer_training_count;
		          if($_POST[$var]){
		              array_push($selected_courses,$_POST[$var]); // add the selected course the $selected_courses array
		              //echo '<script>alert("'.$_POST[$var].'")</script>';
		          }
		          $basic_computer_training_count--;
		      }
		  }
		  
		  if($_POST["advanced_computer_training"]){
		      if($_POST["advanced_computer_training_select"] == 2){ //operating systems category
		          array_push($selected_courses,$_POST["operating_systems"]); // add the selected course the $selected_courses array
		      }elseif($_POST["advanced_computer_training_select"] == 3){ // database management category
		          array_push($selected_courses,$_POST["database_programs"]); // add the selected course the $selected_courses array
		      }elseif($_POST["advanced_computer_training_select"] == 4){ // computer networking category
		          array_push($selected_courses,$_POST["computer_networking"]); // add the selected course the $selected_courses array
		      }elseif($_POST["advanced_computer_training_select"] == 5){ // computer hardware category
		          array_push($selected_courses,$_POST["computer_hardware"]); // add the selected course the $selected_courses array
		      }elseif($_POST["advanced_computer_training_select"] == 6){ // Graphic design category
		          array_push($selected_courses,$_POST["graphics_design"]); // add the selected course the $selected_courses array
		      }elseif($_POST["advanced_computer_training_select"] == 7){ // web design category
		          $web_design_technologies_count = $_POST["web_design_technologies_count"];
		          while($web_design_technologies_count > 0){
    		          $var = 'web_design_technologies_'.$web_design_technologies_count;
    		          if($_POST[$var]){
    		              array_push($selected_courses,$_POST[$var]); // add the selected course the $selected_courses array
    		          }
    		          $web_design_technologies_count--;
    		      }
		      }elseif($_POST["advanced_computer_training_select"] == 8){ // computer security category
		          array_push($selected_courses,$_POST["computer_security"]); // add the selected course the $selected_courses array
		      }elseif($_POST["advanced_computer_training_select"] == 9){ // computer programming category
		          $programming_languages_count = $_POST["programming_languages_count"];
		          while($programming_languages_count > 0){
    		          $var = 'programming_languages_'.$programming_languages_count;
    		          if($_POST[$var]){
    		              array_push($selected_courses,$_POST[$var]); // add the selected course the $selected_courses array
    		          }
    		          $programming_languages_count--;
    		      }
		      }elseif($_POST["advanced_computer_training_select"] == 10){ // mobile development category
		          array_push($selected_courses,$_POST["mobile_development"]); // add the selected course the $selected_courses array
		      }elseif($_POST["advanced_computer_training_select"] == 11){ // advanced concept category
		          array_push($selected_courses,$_POST["advanced_concepts"]); // add the selected course the $selected_courses array
		      }
		  }
		  // set default timezone
          date_default_timezone_set('London/United Kingdom'); // BST
          $current_date = date('Y-m-d');
          $start_date = $_POST["start_date"]; // start date
          $round_off_date = $_POST["round_off_date"]; // end date
          $date_of_birth = $_POST["date_of_birth"]; // date of birth
          $attendant = $_SESSION["s_firstname"];

		  
		  if($firstname_validated && $lastname_validated && $email_validated && $address_validated && $phone_no_validated && $gender_validated && $c_edu_level_validated && $amount_charged_validated && $amount_paid_validated && $outstanding_dept_validated && $next_of_kin_validated && $next_of_kin_address && $next_of_kin_phone_validated){
		      $sql = "INSERT INTO students (firstname, lastname, email, address, phone_no, gender, date_of_birth, registered_date, start_date, round_off_date, c_edu_level, amount_charged, amount_paid, outstanding_dept, next_of_kin, next_of_kin_address, next_of_kin_phone, attendant) 
		      VALUES ('$firstname', '$lastname', '$email', '$address', '$phone_no', '$gender', '$date_of_birth', '$current_date', '$start_date', '$round_off_date', '$c_edu_level', '$amount_charged', '$amount_paid', '$outstanding_dept', '$next_of_kin', '$next_of_kin_address', '$next_of_kin_phone', '$attendant')";
		      if(mysqli_query($conn, $sql)){
                echo 'true';
		      }else{
            	echo "Error";
		      }
		      
		      for($x = 0; $x < count($selected_courses); $x++) {
		          $sql = "SELECT * FROM `courses` WHERE `course_id` = '$selected_courses[$x]'";
		          $result = mysqli_query($conn, $sql);
		          $row = mysqli_fetch_assoc($result);
		          $category = $row["category_id"];
		          
		          /////////////////////////////////////////////////
		          $sql = "SELECT * FROM `students` WHERE `email` = '$email'";
		          $result = mysqli_query($conn, $sql);
		          $row = mysqli_fetch_assoc($result);
		          $student_id = $row["student_id"];
		          
		          ////////////////////////////////////////////////
		          $sql = "INSERT INTO training (course_id, category_id, student_id) VALUES ('$selected_courses[$x]', '$category', '$student_id')";
		          if(mysqli_query($conn, $sql)){
                    echo 'true2';
    		      }else{
                	echo "Error2";
    		      }
		      }
		      echo '<script>alert("Student Registered Successfully")</script>';
		  }
    }else{}	  
?>     
<style>
    .checkbox {
        transform: scale(2);
        -webkit-transform: scale(2);
    }

</style>

<div class="container">
    <br><br><br><br><br><br>
	<div class="row">
		<div class="col-sm-3 .visible-xs, hidden-xs"></div>
		<div class=" col-sm-6 jumbotron">
			<div class="header"></div>
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
						<div class="col-sm-6">
						  <label for="email">Email</label><span class="text-danger"> *<?php echo $emailErr;?></span>
						  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" style="border-radius:12px;" required>
						</div>
						<div class="col-sm-6">
						  <label for="phone_no">Phone Number</label><span class="text-danger"> *<?php echo $phone_noErr;?></span>
						  <input type="number" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Phone Number" style="border-radius:12px;" required>
						</div>
						<br>
						<div class="col-sm-12">
						  <label for="address">Address</label><span class="text-danger"> *<?php echo $addressErr;?></span>
						  <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" style="border-radius:12px;" required>
						</div>
						<div class="col-sm-6">
						  <label for="date_of_birth">Date of Birth</label><span class="text-danger"> *<?php echo $date_of_birthErr;?></span>
						  <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter Date of Birth" style="border-radius:12px;" required>
						</div>
						<div class="col-sm-12"><hr></div> <!--For Spacing and Line Breaks-->
						<div class="col-sm-12">
                            Gender:<span class="text-danger">  *<?php echo $genderErr;?></span><br>
                            <input type="radio" name="gender" value="2" required>Female<br>
                            <input type="radio" name="gender" value="1" required>Male<br>
                            <input type="radio" name="gender" value="0" required>Others
                        </div>
						<div class="col-sm-12"><hr></div> <!--For Spacing and Line Breaks-->
						<div class="col-sm-12">
                            <input type="checkbox" class="form-check-input checkbox" name="basic_computer_training" value="basic_computer_training" id="basic_computer_training" onchange="showbasic(this.value)">
                            <label class="form-check-label" for="basic_computer_training"> Basic Computer Training</label>
                        </div>
                        
                        <div class="col-sm-6" id="basic_computer_training_div">
							<br>
							
							<?php 
								$sql = "SELECT * FROM `courses` WHERE `category_id` = 1"; // course in the basic computer training category
								$result = mysqli_query($conn, $sql);
								$count = 0;
								while($package = mysqli_fetch_assoc($result)){
								    $count++;
									echo '<div class="form-check">
                                              <input class="form-check-input" type="checkbox" value="'.$package['course_id'].'" name="basic_computer_training_'.$count.'">
                                              <label class="form-check-label" for="basic_computer_training">'.$package['course_name'].'</label>
                                            </div>';	
								}
								echo '<input type="hidden" name="basic_computer_training_count" value="'.$count.'">'; // check the number of available basic computer training
							?>
						</div>
                        <div class="col-sm-12"><hr></div> <!--For Spacing and Line Breaks-->
                        <div class="col-sm-12">
                            <input type="checkbox" class="form-check-input checkbox" name="advanced_computer_training" value="advanced_computer_training" id="advanced_computer_training" onchange="showadvanced(this)">
                            <label class="form-check-label" for="advanced_computer_training"> Advanced Computer Training</label>
                        </div>
                        <div class="col-sm-6" id="advanced_computer_training_div">
							<br>
							<select name="advanced_computer_training_select" class="form-control" style="border-radius:12px;" onchange="showSubPackage(this.value)">
								<option value="null"disabled selected>Select Package</option>
								<?php 
									$sql = "SELECT * FROM `categories` WHERE `category_id` > 1"; // courses that are not part of the basic training category
									$result = mysqli_query($conn, $sql);
									$count = 0;
									while($package = mysqli_fetch_assoc($result)){
									    $count++;
										echo '<option value="'.$package['category_id'].'">'.$package['category_name'].'</option>';													
									}
								?>
							</select>
													
							<div id="operating_systems_div">
							    <br>
							    <?php 
									$sql = "SELECT * FROM `courses` WHERE `category_id` = 2"; // all courses on category 2(operating systems)
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
										echo '<div class="form-check">
										        <input class="form-check-input" type="radio" name="operating_systems" value="'.$package['course_id'].'">
                                                <label class="form-check-label" for="operating_systems">'.$package['course_name'].'</label>
                                                </div>';													
									}
								?>
                            </div>
                            
                            <div id="database_programs_div">
                                <br>
							    <?php 
									$sql = "SELECT * FROM `courses` WHERE `category_id` = 3"; // all courses on category 3(Databases)
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
										echo '<div class="form-check">
										        <input class="form-check-input" type="radio" name="database_programs" value="'.$package['course_id'].'">
                                                <label class="form-check-label" for="database_programs">'.$package['course_name'].'</label>
                                                </div>';													
									}
								?>
                            </div>
                            
                            <div id="computer_networking_div">
                                <br>
							    <?php 
									$sql = "SELECT * FROM `courses` WHERE `category_id` = 4"; // all courses on category 4(Networking)
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
										echo '<div class="form-check">
										        <input class="form-check-input" type="radio" name="computer_networking" value="'.$package['course_id'].'" checked>
                                                <label class="form-check-label" for="computer_networking">'.$package['course_name'].'</label>
                                                </div>';													
									}
								?>
                            </div>
                       
                            <div id="computer_hardware_div">
                                <br>
							    <?php 
									$sql = "SELECT * FROM `courses` WHERE `category_id` = 5"; // all courses on category 5(Computer Hardware)
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
										echo '<div class="form-check">
										        <input class="form-check-input" type="radio" name="computer_hardware" value="'.$package['course_id'].'" checked>
                                                <label class="form-check-label" for="computer_hardware">'.$package['course_name'].'</label>
                                                </div>';													
									}
								?>
                            </div>

                            <div id="web_design_technologies_div">
                                <br>
								<?php 
    								$sql = "SELECT * FROM `courses` WHERE `category_id` = 7"; // all courses on cataegory 7(Web Design Technologies)
    								$result = mysqli_query($conn, $sql);
    								$count = 0;
    								while($package = mysqli_fetch_assoc($result)){
    								    $count++;
    									echo '<div class="form-check">
                                                  <input class="form-check-input" type="checkbox" value="'.$package['course_id'].'" name="web_design_technologies_'.$count.'" checked>
                                                  <label class="form-check-label" for="web_design_technologies">'.$package['course_name'].'</label>
                                                </div>';
    								}
    								echo '<input type="hidden" name="web_design_technologies_count" value="'.$count.'">'; // check the number of available web design technologies
    							?>
                            </div>
                            
                            <div id="graphics_design_div">
                                <br>
							    <?php 
									$sql = "SELECT * FROM `courses` WHERE `category_id` = 6"; // all on courses on category 6(Graphic Design)
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
										echo '<div class="form-check">
										        <input class="form-check-input" type="radio" name="graphics_design" value="'.$package['course_id'].'" checked>
                                                <label class="form-check-label" for="graphics_design">'.$package['course_name'].'</label>
                                                </div>';													
									}
								?>
                            </div>
                            
                            <div id="computer_security_div">
                                <br>
							    <?php 
									$sql = "SELECT * FROM `courses` WHERE `category_id` = 8"; // all on courses on category 6(Graphic Design)
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
										echo '<div class="form-check">
										        <input class="form-check-input" type="radio" name="computer_security" value="'.$package['course_id'].'" checked>
                                                <label class="form-check-label" for="computer_security">'.$package['course_name'].'</label>
                                                </div>';													
									}
								?>
                            </div>
                            
                            <div id="programming_languages_div">
                                <br>
								<?php 
    								$sql = "SELECT * FROM `courses` WHERE `category_id` = 9"; // all courses on category 9(Programming Languages)
    								$result = mysqli_query($conn, $sql);
    								$count = 0;
    								while($package = mysqli_fetch_assoc($result)){
    								    $count++;
    									echo '<div class="form-check">
                                                  <input class="form-check-input" type="checkbox" value="'.$package['course_id'].'" name="programming_languages_'.$count.'">
                                                  <label class="form-check-label" for="programming_languages">'.$package['course_name'].'</label>
                                                </div>';	
    								}
    								echo '<input type="hidden" name="programming_languages_count" value="'.$count.'">'; // check the number of available programming languages
    							?>
                            </div>

                            <div id="mobile_development_div">
                                <br>
							    <?php 
									$sql = "SELECT * FROM `courses` WHERE `category_id` = 10"; // all courses on category 10(Mobile Development)
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
										echo '<div class="form-check">
										        <input class="form-check-input" type="radio" name="mobile_development" value="'.$package['course_id'].'" checked>
                                                <label class="form-check-label" for="mobile_development">'.$package['course_name'].'</label>
                                                </div>';													
									}
								?>
                            </div>
                            
                            <div id="advanced_concepts_div">
                                <br>
							    <?php 
									$sql = "SELECT * FROM `courses` WHERE `category_id` = 11"; // all courses on category 11(Advanced Concepts)
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
										echo '<div class="form-check">
										        <input class="form-check-input" type="radio" name="advanced_concepts" value="'.$package['course_id'].'" checked>
                                                <label class="form-check-label" for="advanced_concepts">'.$package['course_name'].'</label>
                                                </div>';													
									}
								?>
                            </div>
						</div>
                        <div class="col-sm-12"><hr></div> <!--For Spacing and Line Breaks-->
                        <div class="col-sm-12"><p><b>Training Duration</b></p></div>
                        <div class="col-sm-6">
						  <label for="start_date">Start date</label><span class="text-danger"> * </span>
						  <input type="date" class="form-control" id="start_date" name="start_date" style="border-radius:12px;" required>
						</div>
						<div class="col-sm-6">
						  <label for="round_off_date">Round off date</label><span class="text-danger"> * </span>
						  <input type="date" class="form-control" id="end_date" name="round_off_date" style="border-radius:12px;" required>
						</div>
						<div class="col-sm-12"><hr></div> <!--For Spacing and Line Breaks-->
						<div class="col-sm-12">
						  <label for="c_edu_level">Current Level of Education</label><span class="text-danger"> *<?php echo $c_edu_levelErr;?></span>
						  <input type="text" class="form-control" id="c_edu_level" name="c_edu_level" placeholder="Enter Current Level of Education" style="border-radius:12px;" required>
						</div>
						<div class="col-sm-12"><hr></div> <!--For Spacing and Line Breaks-->
						<div class="col-sm-12"><p><b><span class="material-icons">money</span></b></p></div>
						<div class="col-sm-4">
						  <label for="amount_charged">Amount Charged</label><span class="text-danger"> *<?php echo $amount_chargedErr;?></span>
						  <input type="number" class="form-control" id="amount_charged" name="amount_charged" placeholder="Enter Amount charged" style="border-radius:12px;" required>
						</div>
						<div class="col-sm-4">
						  <label for="amount_paid">Total Paid</label><span class="text-danger"> *<?php echo $amount_paidErr;?></span>
						  <input type="number" class="form-control" id="amount_paid" name="amount_paid" placeholder="Enter Total Paid" style="border-radius:12px;" required>
						</div>
						<div class="col-sm-4">
						  <label for="outstanding_dept">Total Outstanding</label><span class="text-danger"> *<?php echo $outstanding_deptErr;?></span>
						  <input type="number" class="form-control" id="outstanding_dept" name="outstanding_dept" placeholder="Enter Total Outstanding" style="border-radius:12px;" required>
						</div>
						<div class="col-sm-12"><hr></div> <!--For Spacing and Line Breaks-->
						<div class="col-sm-12"><p><b>Next of Kin Information</b></p></div>
						<div class="col-sm-12">
						  <label for="next_of_kin">Full Name</label><span class="text-danger"> *<?php echo $next_of_kinErr;?></span>
						  <input type="text" class="form-control" id="next_of_kin" name="next_of_kin" placeholder="Enter Full Name" style="border-radius:12px;" required>
						</div>
						<div class="col-sm-12">
						  <label for="next_of_kin_address">Address</label><span class="text-danger"> *<?php echo $next_of_kin_addressErr;?></span>
						  <input type="text" class="form-control" id="next_of_kin_address" name="next_of_kin_address" placeholder="Enter Address" style="border-radius:12px;" required>
						</div>
						<div class="col-sm-6">
						  <label for="next_of_kin_phone">Phone no.</label><span class="text-danger"> *<?php echo $next_of_kin_phoneErr;?></span>
						  <input type="number" class="form-control" id="next_of_kin_phone" name="next_of_kin_phone" placeholder="Enter Phone no." style="border-radius:12px;" required>
						</div>
						<div class="col-sm-12"><hr></div> <!--For Spacing and Line Breaks-->
						<div class="col-sm-12 text-center">
							<button type="submit" name="submit" class="btn btn-primary btn-block" style="border-radius:12px;">Continue</button>
						</div>
					</div>
			  </form>
		 </div>
		 <div class="footer"></div>
	    </div>
		</div>	
	</div>	
</div>


<script>
    document.getElementById("dashboard_link").className = document.getElementById("dashboard_link").className.replace( /(?:^|\s)nav-link active(?!\S)/g , 'nav-link' ); // make Dashboard link inactive
    document.getElementById("addstudent_link").className = document.getElementById("addstudent_link").className.replace( /(?:^|\s)nav-link(?!\S)/g , 'nav-link active' ); // make addStident link active

    // make some of the form elements disappear
    document.getElementById("basic_computer_training_div").style.display = "none";
    document.getElementById("advanced_computer_training_div").style.display = "none";
    function hideSomeDiv(){
        document.getElementById("operating_systems_div").style.display = "none";
        document.getElementById("database_programs_div").style.display = "none";
        document.getElementById("computer_networking_div").style.display = "none";
        document.getElementById("computer_hardware_div").style.display = "none";
        document.getElementById("web_design_technologies_div").style.display = "none";
        document.getElementById("graphics_design_div").style.display = "none";
        document.getElementById("programming_languages_div").style.display = "none";
        document.getElementById("mobile_development_div").style.display = "none";
        document.getElementById("computer_security_div").style.display = "none";
        document.getElementById("advanced_concepts_div").style.display = "none";
    }    
    hideSomeDiv(); // hide some div elements
    /*
      * showbasic() function shows the content 'basic_computer_training_div' element
    */
    function showbasic(id){
      if(basic_computer_training.checked) {
         document.getElementById("basic_computer_training_div").style.display = "block";
      }else{
         document.getElementById("basic_computer_training_div").style.display = "none";
      }
    }
    
    function showadvanced(id){
      if(advanced_computer_training.checked) {
         document.getElementById("advanced_computer_training_div").style.display = "block";
      }else{
         document.getElementById("advanced_computer_training_div").style.display = "none";
      }
    }
    
    function showSubPackage(val) {
        if (val == 'null'){
              
          }
          else if(val == '2'){
              hideSomeDiv();
              document.getElementById("operating_systems_div").style.display = "block";
          }else if(val == '3'){
              hideSomeDiv();
              document.getElementById("database_programs_div").style.display = "block";
          }else if(val == '4'){
              hideSomeDiv();
              document.getElementById("computer_networking_div").style.display = "block";
          }else if(val == '5'){
              hideSomeDiv();
              document.getElementById("computer_hardware_div").style.display = "block";
          }else if(val == '7'){
              hideSomeDiv();
              document.getElementById("web_design_technologies_div").style.display = "block";
          }else if(val == '6'){
              hideSomeDiv();
              document.getElementById("graphics_design_div").style.display = "block";
          }else if(val == '9'){
              hideSomeDiv();
              document.getElementById("programming_languages_div").style.display = "block";
          }else if(val == '10'){
              hideSomeDiv();
              document.getElementById("mobile_development_div").style.display = "block";
          }else if(val == '8'){
              hideSomeDiv();
              document.getElementById("computer_security_div").style.display = "block";
          }else if(val == '11'){
              hideSomeDiv();
              document.getElementById("advanced_concepts_div").style.display = "block";
          }
      
    }
</script>

<?php include_once "navbar_footer.php";?>     
