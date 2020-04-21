<?php 
    include_once "navbar_header.php";
    
    function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
    
    // Variable definition
    $firstname = $lastname = $email = $address = $phone_no = $gender = "";
    $firstnameErr = $lastnameErr = $emailErr = $addressErr = $phone_noErr = $genderErr = "";
    $firstname_validated = $lastname_validated = $email_validated = $address_validated = $phone_no_validated = $gender_validated = "";
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
		      $address_validated = true; // validate address input
		  }
		  
		  if (empty($_POST["gender"])) { // check if gender input is empty
		      $genderErr = "Gender is required";
		  } else {
		      $gender_validated = true; // validate gender input
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
		          
		      }elseif($_POST["advanced_computer_training_select"] == 3){ // database management category
		          
		      }elseif($_POST["advanced_computer_training_select"] == 4){ // computer networking category
		          
		      }elseif($_POST["advanced_computer_training_select"] == 5){ // computer hardware category
		          
		      }elseif($_POST["advanced_computer_training_select"] == 6){ // Graphic design category
		          
		      }elseif($_POST["advanced_computer_training_select"] == 7){ // web design category
		          
		      }elseif($_POST["advanced_computer_training_select"] == 8){ // computer security category
		          
		      }elseif($_POST["advanced_computer_training_select"] == 9){ // computer programming category
		          
		      }elseif($_POST["advanced_computer_training_select"] == 10){ // mobile development category
		          
		      }elseif($_POST["advanced_computer_training_select"] == 11){ // advanced concept category
		          
		      }
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
						<div class="col-sm-12"><hr></div> <!--For Spacing and Line Breaks-->
						<div class="col-sm-12">
                            Gender:<span class="text-danger">  *<?php echo $genderErr;?></span><br>
                            <input type="radio" name="gender" value="female" required>Female<br>
                            <input type="radio" name="gender" value="male" required>Male<br>
                            <input type="radio" name="gender" value="others" required>Others
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
    								$count = 1;
    								while($package = mysqli_fetch_assoc($result)){
    									echo '<div class="form-check">
                                                  <input class="form-check-input" type="checkbox" value="'.$package['course_id'].'" name="web_design_technologies_'.$count.'" checked disabled>
                                                  <label class="form-check-label" for="web_design_technologies">'.$package['course_name'].'</label>
                                                </div>';
                                        $count++;        
    								}
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
    								$count = 1;
    								while($package = mysqli_fetch_assoc($result)){
    									echo '<div class="form-check">
                                                  <input class="form-check-input" type="checkbox" value="'.$package['course_id'].'" name="programming_languages_'.$count.'">
                                                  <label class="form-check-label" for="programming_languages">'.$package['course_name'].'</label>
                                                </div>';	
                                        $count++;        
    								}
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
                        <div class="col-sm-6">
						  <label for="training_duration">Training Duration</label><span class="text-danger"> * </span>
						  <input type="date" class="form-control" id="training_duration" name="training_duration" style="border-radius:12px;" required>
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
