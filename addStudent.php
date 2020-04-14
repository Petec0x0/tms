<?php include_once "navbar_header.php";?>     
<style>
    .checkbox {
        transform: scale(2);
        -webkit-transform: scale(2);
    }

</style>
<div class="container">
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
								$sql = "SELECT * FROM `basic_computer_training` WHERE 1";
								$result = mysqli_query($conn, $sql);
								while($package = mysqli_fetch_assoc($result)){
									echo '<div class="form-check">
                                              <input class="form-check-input" type="checkbox" value="'.$package['course_id'].'" id="basic_computer_training">
                                              <label class="form-check-label" for="basic_computer_training">'.$package['packages'].'</label>
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
									$sql = "SELECT * FROM `advanced_computer_training` WHERE 1";
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
										echo '<option value="'.$package['id'].'">'.$package['packages'].'</option>';													
									}
								?>
							</select>
													
							<div id="operating_systems_div">
							    <br>
							    <?php 
									$sql = "SELECT * FROM `operating_systems` WHERE 1";
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
										echo '<div class="form-check">
										        <input class="form-check-input" type="radio" name="operating_systems" value="'.$package['course_id'].'">
                                                <label class="form-check-label" for="operating_systems">'.$package['os'].'</label>
                                                </div>';													
									}
								?>
                            </div>
                            
                            <div id="database_programs_div">
                                <br>
							    <?php 
									$sql = "SELECT * FROM `database_programs` WHERE 1";
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
										echo '<div class="form-check">
										        <input class="form-check-input" type="radio" name="database_programs" value="'.$package['course_id'].'">
                                                <label class="form-check-label" for="database_programs">'.$package['_databases'].'</label>
                                                </div>';													
									}
								?>
                            </div>
                            
                            <div id="computer_networking_div">
                                <br>
							    <?php 
									$sql = "SELECT * FROM `computer_networking` WHERE 1";
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
										echo '<div class="form-check">
										        <input class="form-check-input" type="radio" name="computer_networking" value="'.$package['course_id'].'" checked>
                                                <label class="form-check-label" for="computer_networking">'.$package['package_name'].'</label>
                                                </div>';													
									}
								?>
                            </div>
                       
                            <div id="computer_hardware_div">
                                <br>
							    <?php 
									$sql = "SELECT * FROM `computer_hardware` WHERE 1";
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
										echo '<div class="form-check">
										        <input class="form-check-input" type="radio" name="computer_hardware" value="'.$package['course_id'].'" checked>
                                                <label class="form-check-label" for="computer_hardware">'.$package['package_name'].'</label>
                                                </div>';													
									}
								?>
                            </div>

                            <div id="web_design_technologies_div">
                                <br>
								<?php 
    								$sql = "SELECT * FROM `web_design_technologies` WHERE 1";
    								$result = mysqli_query($conn, $sql);
    								while($package = mysqli_fetch_assoc($result)){
    									echo '<div class="form-check">
                                                  <input class="form-check-input" type="checkbox" value="'.$package['course_id'].'" id="web_design_technologies" checked disabled>
                                                  <label class="form-check-label" for="web_design_technologies">'.$package['web_technologies'].'</label>
                                                </div>';													
    								}
    							?>
                            </div>
                            
                            <div id="graphics_design_div">
                                <br>
							    <?php 
									$sql = "SELECT * FROM `graphics_design` WHERE 1";
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
										echo '<div class="form-check">
										        <input class="form-check-input" type="radio" name="graphics_design" value="'.$package['course_id'].'" checked>
                                                <label class="form-check-label" for="graphics_design">'.$package['package_name'].'</label>
                                                </div>';													
									}
								?>
                            </div>
                            
                            <div id="programming_languages_div">
                                <br>
								<?php 
    								$sql = "SELECT * FROM `programming_languages` WHERE 1";
    								$result = mysqli_query($conn, $sql);
    								while($package = mysqli_fetch_assoc($result)){
    									echo '<div class="form-check">
                                                  <input class="form-check-input" type="checkbox" value="'.$package['course_id'].'" id="programming_languages">
                                                  <label class="form-check-label" for="programming_languages">'.$package['languages'].'</label>
                                                </div>';													
    								}
    							?>
                            </div>

                            <div id="mobile_development_div">
                                <br>
							    <?php 
									$sql = "SELECT * FROM `mobile_development` WHERE 1";
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
										echo '<div class="form-check">
										        <input class="form-check-input" type="radio" name="mobile_development" value="'.$package['course_id'].'" checked>
                                                <label class="form-check-label" for="mobile_development">'.$package['package_name'].'</label>
                                                </div>';													
									}
								?>
                            </div>
                            
                            <div id="advanced_concepts_div">
                                <br>
							    <?php 
									$sql = "SELECT * FROM `advanced_concepts` WHERE 1";
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
										echo '<div class="form-check">
										        <input class="form-check-input" type="radio" name="advanced_concepts" value="'.$package['course_id'].'" checked>
                                                <label class="form-check-label" for="advanced_concepts">'.$package['topics'].'</label>
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

    // make some the form elements disappear
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
        //document.getElementById("").style.display = "none";
        document.getElementById("advanced_concepts_div").style.display = "none";
    }    
    hideSomeDiv();
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
          else if(val == '1'){
              hideSomeDiv();
              document.getElementById("operating_systems_div").style.display = "block";
          }else if(val == '2'){
              hideSomeDiv();
              document.getElementById("database_programs_div").style.display = "block";
          }else if(val == '3'){
              hideSomeDiv();
              document.getElementById("computer_networking_div").style.display = "block";
          }else if(val == '4'){
              hideSomeDiv();
              document.getElementById("computer_hardware_div").style.display = "block";
          }else if(val == '5'){
              hideSomeDiv();
              document.getElementById("web_design_technologies_div").style.display = "block";
          }else if(val == '6'){
              hideSomeDiv();
              document.getElementById("graphics_design_div").style.display = "block";
          }else if(val == '7'){
              hideSomeDiv();
              document.getElementById("programming_languages_div").style.display = "block";
          }else if(val == '8'){
              hideSomeDiv();
              document.getElementById("mobile_development_div").style.display = "block";
          }else if(val == '9'){
              hideSomeDiv();
              //document.getElementById("").style.display = "block";
          }else if(val == '10'){
              hideSomeDiv();
              document.getElementById("advanced_concepts_div").style.display = "block";
          }
      
    }
</script>

<?php include_once "navbar_footer.php";?>     
