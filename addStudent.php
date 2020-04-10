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
							<select name="basic_computer_training" class="form-control" style="border-radius:12px;">
								<option value="default"disabled selected>Select Package</option>
								<?php 
									$sql = "SELECT * FROM `basic_computer_training` WHERE 1";
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
										echo '<option value="'.$package['id'].'">'.$package['packages'].'</option>';													
									}
								?>
							</select>
						</div>
                        <div class="col-sm-12"><hr></div> <!--For Spacing and Line Breaks-->
                        <div class="col-sm-12">
                            <input type="checkbox" class="form-check-input checkbox" name="advanced_computer_training" id="advanced_computer_training" onchange="showadvanced(this)">
                            <label class="form-check-label" for="advanced_computer_training"> Advanced Computer Training</label>
                        </div>
                        <div class="col-sm-6" id="advanced_computer_training_div">
							<br>
							<select name="advanced_computer_training" class="form-control" style="border-radius:12px;">
								<option value="default"disabled selected>Select Package</option>
								<?php 
									$sql = "SELECT * FROM `advanced_computer_training` WHERE 1";
									$result = mysqli_query($conn, $sql);
									while($package = mysqli_fetch_assoc($result)){
										echo '<option value="'.$package['id'].'">'.$package['packages'].'</option>';													
									}
								?>
							</select>
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
    document.getElementById("basic_computer_training_div").style.display = "none";
    document.getElementById("advanced_computer_training_div").style.display = "none";
    
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
</script>

<?php include_once "navbar_footer.php";?>     
