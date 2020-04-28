<?php 
    include_once "navbar_header.php";
    $sql = "SELECT * FROM `students` WHERE 1"; // select all courses
	$result = mysqli_query($conn, $sql);
	$income = 0;
	while($data = mysqli_fetch_assoc($result)){
	    $income += $data['amount_paid'];
	}
?>     
<style>
    .counter {
    background-color:#f5f5f5;
    padding: 20px 0;
    border-radius: 5px;
    }
    
    .count-title {
        font-size: 40px;
        font-weight: normal;
        margin-top: 10px;
        margin-bottom: 0;
        text-align: center;
    }
    
    .count-text {
        font-size: 13px;
        font-weight: normal;
        margin-top: 10px;
        margin-bottom: 0;
        text-align: center;
    }
    
    .fa-2x {
        margin: 0 auto;
        float: none;
        display: table;
        color: #4ad1e5;
    }
</style>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
     <br><br><br><br><br><br>
    </div>
    <div class="row col-sm-12">
      <div class="col-sm-4">
          <span>Filter by Date</span>
          <div class="row">
              <div class="col-sm-6">
    		      From: <input type="date" id="from" name="from" style="border-radius:12px;" required>
    		  </div>
    		  <div class="col-sm-6">
    		      To: <input type="date" id="to" name="to" style="border-radius:12px;" required>
    		  </div>
              </div>
      </div>      
      <div class="col-sm-4">
          <span>Filter by Course</span>
          <select name="courses" class="form-control" style="border-radius:12px;" onchange="filter(this.value)">
		  	<option value="null"disabled selected>Select Course</option>
			<?php 
				$sql = "SELECT * FROM `courses` WHERE 1"; // select all courses
				$result = mysqli_query($conn, $sql);
				$count = 0;
				while($course = mysqli_fetch_assoc($result)){
				    $count++;
					echo '<option value="'.$course['course_id'].'">'.$course['course_name'].'</option>';													
				}
			?>
		</select>
      </div>
  </div>
    <div class="row text-center">
	   <div class="col">
           <div class="counter">
             <i class="fa fa-money fa-2x"></i>
             <h4 class="timer count-title count-number" data-to="100" data-speed="1500">₦<?php echo $income;?></h4>
              <p class="count-text ">INCOME</p>
           </div>
	   </div>
    </div>

</main>
<?php include_once "navbar_footer.php";?>     