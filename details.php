<?php 
    include_once "navbar_header.php";
    
    function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>     

<div class="container">
	<div class="row">
		<div class="col-sm-3 .visible-xs, hidden-xs"></div>
		<div class=" col-sm-6 jumbotron">
			<div class="header">
			  <h4>STUDENT DETAILS</h4>
			</div>
			<div class=" container">
			  <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

				<div class="form-group">
					<div class="row">
					<?php
					    $id = test_input($_GET['usr_id']);
					    $sql = "SELECT * FROM `students` WHERE student_id = '$id'";
                	    $result = mysqli_query($conn, $sql);
                	    while($student = mysqli_fetch_assoc($result)){
					    
    						echo '<div class="col-sm-6">
    						  <label for="firstname">First Name</label>
    						  <input type="text" class="form-control" id="firstname" name="firstname" value="'.$student['firstname'].'" readonly style="border-radius:12px;" required>
    						</div> 
    						
    						<div class="col-sm-6">
    						  <label for="lastname">Last Name</label>
    						  <input type="text" class="form-control" id="lastname" name="lastname" value="'.$student['lastname'].'" readonly style="border-radius:12px;" required>
    						</div>
    						
    						<div class="col-sm-12">
    						  <label for="email"></span>Email Address</label>
    						  <input type="email" class="form-control" id="email" name="email" value="'.$student['email'].'" readonly style="border-radius:12px;" required>
    						</div>
    						
    						<div class="col-sm-6">
    						  <label for="date_of_birth">Date of Birth</label>
    						  <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" value="'.$student['date_of_birth'].'" readonly style="border-radius:12px;" required>
    						</div>  
    						
    						<div class="col-sm-6">
    						  <label for="phone_no">Phone no.</label>
    						  <input type="text" class="form-control" id="phone_no" name="phone_no" value="'.$student['phone_no'].'" readonly style="border-radius:12px;" required>
    						</div>  
    						
    						<div class="col-sm-12">
    						  <label for="address">Address</label>
    						  <input type="text" class="form-control" id="address" name="address" value="'.$student['address'].'" readonly style="border-radius:12px;" required>
    						</div>
    						
    						<div class="col-sm-12">
    						  <label for="c_edu_level">Current Level of Education</label>
    						  <input type="text" class="form-control" id="c_edu_level" name="c_edu_level" value="'.$student['c_edu_level'].'" readonly style="border-radius:12px;" required>
    						</div>
    						
    						<div class="col-sm-12">
    						  <label for="next_of_kin">Next of Kin</label>
    						  <input type="text" class="form-control" id="next_of_kin" name="next_of_kin" value="'.$student['next_of_kin'].'" readonly style="border-radius:12px;" required>
    						</div>
    						
    						<div class="col-sm-12">
    						  <label for="next_of_kin_phone">Next of Kin Phone No.</label>
    						  <input type="text" class="form-control" id="next_of_kin_phone" name="next_of_kin_phone" value="'.$student['next_of_kin_phone'].'" readonly style="border-radius:12px;" required>
    						</div>
    						
    						<div class="col-sm-12">
    						  <label for="next_of_kin_address">Next of Kin Address</label>
    						  <input type="text" class="form-control" id="next_of_kin_address" name="next_of_kin_address" value="'.$student['next_of_kin_address'].'" readonly style="border-radius:12px;" required>
    						</div>
    						
    						<div class="col-sm-12"><hr></div> <!--For Spacing and Line Breaks-->
    						<div class="col-sm-12"><p><b><span class="material-icons">money</span></b></p></div>
    						<div class="col-sm-4">
    						  <label for="amount_charged">Amount Charged</label>
    						  <input type="number" class="form-control" id="amount_charged" name="amount_charged" value="'.$student['amount_charged'].'" placeholder="Enter Amount charged" style="border-radius:12px;" required>
    						</div>
    						
    						<div class="col-sm-4">
    						  <label for="amount_paid">Total Paid</label>
    						  <input type="number" class="form-control" id="amount_paid" name="amount_paid" value="'.$student['amount_paid'].'" placeholder="Enter Total Paid" style="border-radius:12px;" required>
    						</div>
    						
    						<div class="col-sm-4">
    						  <label for="outstanding_dept">Total Outstanding</label>
    						  <input type="number" class="form-control" id="outstanding_dept" name="outstanding_dept" value="'.$student['outstanding_dept'].'" placeholder="Enter Total Outstanding" style="border-radius:12px;" required>
    						</div>
    						
    						<div class="col-sm-12"><hr></div> <!--For Spacing and Line Breaks-->';  
                	    }	
					?>	
						<br><br><br><br>
						<div class="col-sm-12 text-center">
							<button type="submit" name="submit" class="btn btn-primary btn-block" style="border-radius:12px;">Update</button>
						</div>
					</div>
				</div>	
				</form>
	        </div>
	   </div>
	</div>
</div>

<?php include_once "navbar_footer.php";?>     