<?php 
    include_once 'includes/header.php';
?>

<main class="container">
    <hr>
    <div class="row container">
        <div class="col-md-12">
            <div class="card">
                <header class="card-header">
                	<h3 class="card-title mt-2">Register Candidate</h3>
                </header>
                <article class="card-body">
                    <form name="register">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#bio">Candidate's Bio</a></li>
                            <li><a data-toggle="tab" href="#next_of_kin_bio">Next of Kin Information</a></li>
                            <li><a data-toggle="tab" href="#program">Program</a></li>
                        </ul>
                        
                          <div class="tab-content">
                            <div id="bio" class="tab-pane fade in active">
                                <div class="form-group">
                    				<div class="row">
                    					<div class="col-sm-6">
                    					  <label for="firstname">Firstname</label><span class="text-danger"> *</span>
                    					  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Firstname" style="border-radius:12px;" required>
                    					</div>  
                    					<div class="col-sm-6">
                    					  <label for="lastname"></span>Lastname</label><span class="text-danger"> *</span>
                    					  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Lastname" style="border-radius:12px;" required>
                    					</div>
                    					<br>
                    					<div class="col-sm-6">
                    					  <label for="email">Email</label><span class="text-danger"> *</span>
                    					  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" style="border-radius:12px;" required>
                    					</div>
                    					<div class="col-sm-6">
                    					  <label for="phone_no">Phone Number</label><span class="text-danger"> *</span>
                    					  <input type="number" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Phone Number" style="border-radius:12px;" required>
                    					</div>
                    					<br>
                    					<div class="col-sm-12">
                    					  <label for="address">Address</label><span class="text-danger"> *</span>
                    					  <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" style="border-radius:12px;" required>
                    					</div>
                    					<div class="col-sm-6">
                    					  <label for="dob">Date of Birth</label><span class="text-danger"> *</span>
                    					  <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter Date of Birth" style="border-radius:12px;" required>
                    					</div>
                    					<div class="col-sm-6">
                    					  <label for="sex_id">Sex</label><span class="text-danger"> *</span>
                    					  <select class="form-control" id="sex_id" name="sex_id">
                    					        <option value="default" selected disabled>Select</option>
                                                <option value="2">Female</option>
                                                <option value="1">Male</option>
                                                <option value="0">Others</option>
                                          </select>
                    					</div>
                    					<div class="col-sm-6">
                    					  <label for="edu_level">Level of Education</label><span class="text-danger"> *</span>
                    					  <input type="text" class="form-control" id="edu_level" name="edu_level" placeholder="..." style="border-radius:12px;" required>
                    					</div>
                    					<div class="col-sm-6">
                    					  <label for="referee">Referee</label><span class="text-danger"> *</span>
                    					  <input type="text" class="form-control" id="referee" name="referee" placeholder="..." style="border-radius:12px;" required>
                    					</div>
                                    </div>
                                </div>
                            </div>
                            <div id="next_of_kin_bio" class="tab-pane fade">
                                <div class="form-group">
                    				<div class="row">
                                        <div class="col-sm-12">
                    					  <label for="next_of_kin_name">Next of Kin Name</label><span class="text-danger"> *</span>
                    					  <input type="text" class="form-control" id="next_of_kin_name" name="next_of_kin_name" placeholder="..." style="border-radius:12px;" required>
                    					</div>
                    					<div class="col-sm-12">
                    					  <label for="next_of_kin_addr">Next of Kin Address</label><span class="text-danger"> *</span>
                    					  <input type="text" class="form-control" id="next_of_kin_addr" name="next_of_kin_addr" placeholder="Enter Address" style="border-radius:12px;" required>
                    					</div>
                    					<div class="col-sm-12">
                    					  <label for="next_of_kin_phn">Next of Kin Phone</label><span class="text-danger"> *</span>
                    					  <input type="text" class="form-control" id="next_of_kin_phn" name="next_of_kin_phn" placeholder="..." style="border-radius:12px;" required>
                    					</div>
                    				</div>
                    			</div>
                            </div>
                            <div id="program" class="tab-pane fade">
                                <h4>Select Programme/Course</h4>
                                <?php
                                    $modelObj = new Model();
                                    $courses = $modelObj->getCourses();
                                    
                                    $sn_count = 1;
                                    foreach($courses as $value){
                                        $course_name = $value["course_name"];
                                        $course_id = $value["course_id"];
                                        echo '<label class="checkbox-inline big-checkbox"><input type="checkbox" value="'.$course_id.'">'.$course_name.'</label>';
                                        $sn_count++;
                                    }
                                ?>
                                
                                <h4>Programme/Course Duration</h4>
                                <div class="form-group">
                    				<div class="row">
                    				    <div class="col-sm-6">
                    					  <label for="start_date">Start Date</label><span class="text-danger"> *</span>
                    					  <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Enter Date of Birth" style="border-radius:12px;" required>
                    					</div>
                    					
                    					<div class="col-sm-6">
                    					  <label for="end_date">Finish Date</label><span class="text-danger"> *</span>
                    					  <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Enter Date of Birth" style="border-radius:12px;" required>
                    					</div>
                    				</div>
                    			</div>
                            </div>
                          </div>
                    </form>
                </article> <!-- card-body end .// -->
            </div> <!-- card.// -->
        </div> <!-- col.//-->
    
    </div> <!-- row.//-->
    
</main>
<script>
    document.getElementById("addcandidate_nav").className = 'active'; // make Dashboard link inactive
</script>

<?php include_once 'includes/footer.php';?>