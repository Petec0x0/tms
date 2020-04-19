<?php include_once "navbar_header.php";?>     
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
						  <label for="phone_no">Phone Number</label><span class="text-danger"> * </span>
						  <input type="tel" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Phone Number" style="border-radius:12px;" required>
						</div>
						<br>
						<div class="col-sm-12">
						  <label for="address">Address</label><span class="text-danger"> * </span>
						  <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" style="border-radius:12px;" required>
						</div>
						<div class="col-sm-12"><hr></div> <!--For Spacing and Line Breaks-->
						<div class="col-sm-12">
                            <input type="checkbox" class="form-check-input checkbox" name="basic_computer_training" id="basic_computer_training" onchange="showbasic(this.value)">
                            <label class="form-check-label" for="basic_computer_training"> Basic Computer Training</label>
                        </div>
                        <div class="col-sm-6" id="basic_computer_training_div">
							<br>
							
							<?php 
								$sql = "SELECT * FROM `courses` WHERE `category_id` = 1"; // course in the basic computer training category
								$result = mysqli_query($conn, $sql);
								while($package = mysqli_fetch_assoc($result)){
									echo '<div class="form-check">
                                              <input class="form-check-input" type="checkbox" value="'.$package['course_id'].'" id="basic_computer_training">
                                              <label class="form-check-label" for="basic_computer_training">'.$package['course_name'].'</label>
                                            </div>';													
								}
							?>
						</div>
                        <div class="col-sm-12"><hr></div> <!--For Spacing and Line Breaks-->
                        <div class="col-sm-12">
                            <input type="checkbox" class="form-check-input checkbox" name="advanced_computer_training" id="advanced_computer_training" onchange="showadvanced(this)">
                            <label class="form-check-label" for="advanced_computer_training"> Advanced Computer Training</label>
                        </div>
                        <div class="col-sm-6" id="advanced_computer_training_div">
							<br>
							<select name="advanced_computer_training" class="form-control" style="border-radius:12px;" onchange="showSubPackage(this.value)">
								<option value="null"disabled selected>Select Package</option>
								<?php 
									$sql = "SELECT * FROM `categories` WHERE `category_id` > 1"; // courses that are not part of the basic training category
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
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
    								while($package = mysqli_fetch_assoc($result)){
    									echo '<div class="form-check">
                                                  <input class="form-check-input" type="checkbox" value="'.$package['course_id'].'" id="web_design_technologies" checked disabled>
                                                  <label class="form-check-label" for="web_design_technologies">'.$package['course_name'].'</label>
                                                </div>';													
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
    								while($package = mysqli_fetch_assoc($result)){
    									echo '<div class="form-check">
                                                  <input class="form-check-input" type="checkbox" value="'.$package['course_id'].'" id="programming_languages">
                                                  <label class="form-check-label" for="programming_languages">'.$package['course_name'].'</label>
                                                </div>';													
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
						  <label for="start_date">Start Date</label><span class="text-danger"> * </span>
						  <input type="date" class="form-control" id="start_date" name="start_date" style="border-radius:12px;" required>
						</div>
						<div class="col-sm-6">
						  <label for="end_date">End Date</label><span class="text-danger"> * </span>
						  <input type="date" class="form-control" id="end_date" name="end_date" style="border-radius:12px;">
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
