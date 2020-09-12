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
    .loader {
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid black;
      border-bottom: 16px solid black;
      width: 120px;
      height: 120px;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
    }
    
    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }
    
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    #loader{
        display: none;
    }
</style>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"></div>
    <div class="col-sm-12"><hr></div> <!--For Spacing and Line Breaks-->
    <div class="col-sm-12"><hr></div> <!--For Spacing and Line Breaks-->
    <div class="row col-sm-12">
      <div class="col-sm-4">
          <span><b>Filter by Date</b></span>
          <div class="row">
              <div class="col-sm-6">
    		      From: <input type="date" class="form-control" id="from" name="from" style="border-radius:12px;" required>
    		  </div>
    		  <div class="col-sm-6">
    		      To: <input type="date" class="form-control" id="to" name="to" onchange="dateFilter(event);" style="border-radius:12px;" required>
    		  </div>
              </div>
      </div>      
      <div class="col-sm-4">
          <span><b>Filter by Course</b></span>
          <select name="courses" class="form-control" style="border-radius:12px;" onchange="courseFilter(this.value)">
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
      <div class="col-sm-4">
          <span><b>Filter by Period</b></span>
          <select name="period" class="form-control" style="border-radius:12px;" onchange="periodFilter(this.value)">
		  	<option value="null"disabled selected>Select Period</option>
		  	<option value="7">Last 1 Week</option>
		  	<option value="30">Last 1 Month</option>
		  	<option value="182">Last 6 Month</option>
		  	<option value="365">Last 1 Year</option>
		</select>
      </div>
  </div>
  <center><div id="loader" class="loader"></div></center>
    <div id="income_container" class="row text-center">
	   <div class="col">
           <div class="counter">
             <i class="fa fa-money fa-2x"></i>
             <h4 class="timer count-title count-number" data-to="100" data-speed="1500">₦<span id="income"><?php echo $income;?></span></h4>
              <p class="count-text ">INCOME</p>
           </div>
	   </div>
    </div>
</main>
<script>
    document.getElementById("dashboard_link").className = document.getElementById("dashboard_link").className.replace( /(?:^|\s)nav-link active(?!\S)/g , 'nav-link' ); // make Dashboard link inactive
    document.getElementById("income_link").className = document.getElementById("income_link").className.replace( /(?:^|\s)nav-link(?!\S)/g , 'nav-link active' ); // make income link active
    
    function loadDetails(val){
        var xhttpTimer = new XMLHttpRequest();
		xhttpTimer.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			    document.getElementById("loader").style.display = "none";
			    document.getElementById("income_container").style.display = "block";
				document.getElementById("income").innerHTML = this.responseText;
			}
		};
		xhttpTimer.open("POST", "asynchronously.php", true);
		xhttpTimer.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttpTimer.send("course_id_income="+val);
    }
    
    function periodDetails(val){
        document.getElementById("income_container").style.display = "none";
        document.getElementById("loader").style.display = "block";
        var currentDate = new Date();
        current_year = currentDate.getFullYear();
        current_month = currentDate.getMonth()+1;
        current_day = currentDate.getDate();
        
        if (current_day < 10) {
          current_day = '0' + current_day;
        }
        if (current_month < 10) {
          current_month = '0' + current_month;
        } 
        
        var date = new Date(currentDate.getTime() - val * 24 * 60 * 60 * 1000);
        target_year = date.getFullYear();
        target_month = date.getMonth()+1;
        target_day = date.getDate();
        
        if (target_day < 10) {
          target_day = '0' + target_day;
        }
        if (target_month < 10) {
          target_month = '0' + target_month;
        } 
        
        var period_from = target_year+"-"+target_month+"-"+target_day;
        var period_to = current_year+"-"+current_month+"-"+current_day;
        
        var xhttpTimer = new XMLHttpRequest();
		xhttpTimer.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			    document.getElementById("loader").style.display = "none";
			    document.getElementById("income_container").style.display = "block";
				document.getElementById("income").innerHTML = this.responseText;
			}
		};
		xhttpTimer.open("POST", "asynchronously.php", true);
		xhttpTimer.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttpTimer.send("period_from="+period_from+"&period_to="+period_to);
    }

    function courseFilter(val){
        document.getElementById("income_container").style.display = "none";
        document.getElementById("loader").style.display = "block";
        if (val == 'null'){
            
        }else if(val == '1'){
            loadDetails(val);
        }else if(val == '2'){
            loadDetails(val);
        }else if(val == '3'){
            loadDetails(val);
        }else if(val == '4'){
            loadDetails(val);
        }else if(val == '5'){
            loadDetails(val);
        }else if(val == '6'){
            loadDetails(val);
        }else if(val == '7'){
            loadDetails(val);
        }else if(val == '8'){
            loadDetails(val);
        }else if(val == '9'){
            loadDetails(val);
        }else if(val == '10'){
            loadDetails(val);
        }else if(val == '11'){
            loadDetails(val);
        }else if(val == '12'){
            loadDetails(val);
        }else if(val == '13'){
            loadDetails(val);
        }else if(val == '14'){
            loadDetails(val);
        }else if(val == '15'){
            loadDetails(val);
        }else if(val == '16'){
            loadDetails(val);
        }else if(val == '17'){
            loadDetails(val);
        }else if(val == '18'){
            loadDetails(val);
        }else if(val == '19'){
            loadDetails(val);
        }else if(val == '20'){
            loadDetails(val);
        }else if(val == '21'){
            loadDetails(val);
        }else if(val == '22'){
            loadDetails(val);
        }else if(val == '23'){
            loadDetails(val);
        }else if(val == '24'){
            loadDetails(val);
        }else if(val == '25'){
            
        }
    }
    function periodFilter(val){
        if (val == 'null'){
            
        }else if(val == '7'){
            periodDetails(val);
        }else if(val == '30'){
            periodDetails(val);
        }else if(val == '182'){
            periodDetails(val);
        }else if(val == '365'){
            periodDetails(val);
        }
    }
    
    function dateFilter(e){
        var from = document.getElementById('from').value;
        var to = e.target.value;
        if(from == ""){
            alert("'From' input field cannot be empty");
        }else{
            document.getElementById("income_container").style.display = "none";
            document.getElementById("loader").style.display = "block";
            var xhttpTimer = new XMLHttpRequest();
		    xhttpTimer.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
    			    document.getElementById("loader").style.display = "none";
    			    document.getElementById("income_container").style.display = "block";
    				document.getElementById("income").innerHTML = this.responseText;
    			}
    		};
    		xhttpTimer.open("POST", "asynchronously.php", true);
    		xhttpTimer.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    		xhttpTimer.send("from="+from+"&to="+to);
            }
    }
</script>
<?php include_once "navbar_footer.php";?>     